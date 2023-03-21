<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\ApiValidate;
use App\Http\Controllers\Controller;
use App\Mail\DemoMail;
use App\Models\Account;
use App\Models\Company;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use stdClass;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = ApiValidate::login($request, User::class);
        // $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = User::find(Auth::guard('web')->user()->id);

            $user->firebase_token = $request->firebase_token;
            $user->save();
            return Api::setResponse('user', $user->withToken());
        } else {
            return Api::setError('Invalid credentials');
        }
    }

    public function register(Request $request)
    {
        $credentials = ApiValidate::register($request, User::class);



        $user = User::find(User::create($credentials)->id);


        Account::create([

            'user_id' => $user->id,

        ]);
        return Api::setResponse('user', $user->withToken());



        $response = new stdClass;
        $response->user = $user->withToken();
        // $response->otp = $otp;
        return response()->json($response);
    }


    public function companylogin(Request $request)
    {


        $credentials = ApiValidate::login($request, User::class);


        if (Auth::guard('company')->attempt($credentials)) {
            $company = Company::find(Auth::guard('company')->user()->id);
            $company->firebase_token = $request->firebase_token;
            $company->save();
            return Api::setResponse('company', $company->withToken());
        } else {
            return Api::setError('Invalid credentials');
        }
        $notification = Company::create([
            'firebase_token' => $request->firebase_token,

        ]);

    }
    public function change(Request $request)
    {

        $data = Company::where('email', $request->email)->first();

        $data = $data->withpassword();
        $previousPassword = $data->password;

        // dd($new,$previousPassword);

        if (Hash::check($request->password, $previousPassword)) {
            $data->update([
                'password' => $request->newpassword
            ]);
            // Passwords match
            return Api::setResponse('update', $data);
        } else {
            // Passwords do not match
            return Api::setResponse('error', 'Current password incorrect');
        }


        // toastr()->success('update successfully ');

    }
    public function forget(Request $request)
    {

        $data = Company::where('email', $request->email)->first();
        if ($data != null) {
            $otp = random_int(100000, 999999);
            $mailData = [
                'title' => 'Klicks-Request Change Password',
                'name' => $data->name,
                'otp' => $otp,
            ];

            Mail::to($request->email)->send(new DemoMail($mailData));
            return Api::setResponse('otp', $otp);
        } else {
            return Api::setError('Company not exist on this email');
        }
    }

    public function forgetpassword(Request $request)
    {

        $data = Company::where('email', $request->email)->first();

        $data->update([
            'password' => $request->password
        ]);
        // toastr()->success('update successfully ');
        return Api::setResponse('update', $data);
    }
    ////////////////user///////
    public function get(Request $request)
    {
        $data = User::where('api_token',$request->api_token)->first();
        return Api::setResponse('user', $data);
    }
    public function changeuserpassword(Request $request)
    {

        $data = User::where('email', $request->email)->first();

        $data = $data->withpassword();
        $previousPassword = $data->password;

        // dd($new,$previousPassword);

        if (Hash::check($request->password, $previousPassword)) {
            $data->update([
                'password' => $request->newpassword
            ]);
            // Passwords match
            return Api::setResponse('update', $data);
        } else {
            // Passwords do not match
            return Api::setResponse('error', 'Current password incorrect');
        }


        // toastr()->success('update successfully ');

    }
    public function userforgetpassword(Request $request)
    {

        $data = User::where('email', $request->email)->first();
        if ($data != null) {
            $otp = random_int(100000, 999999);
            $mailData = [
                'title' => 'Klicks-Request Change Password',
                'name' => $data->name,
                'otp' => $otp,
            ];

            Mail::to($request->email)->send(new DemoMail($mailData));
            return Api::setResponse('otp', $otp);
        } else {
            return Api::setError('user not exist on this email');
        }
    }
    public function forgetchange(Request $request)
    {

        $data = User::where('email', $request->email)->first();

        $data->update([
            'password' => $request->password
        ]);
        // toastr()->success('update successfully ');
        return Api::setResponse('update', $data);
    }

    public function index(){
        return view('otp');
      }
      public function otplogin(Request $request)
      {

          $data = User::where('phone', $request->phone)->first();
          if ($data != null) {

              return Api::setResponse('data', $data);
          } else {
              return Api::setError('User not exist on this number');
          }
      }

    //   public function handleProviderCallback(Request $request)
    //   {
    //       $validator = Validator::make($request->only('provider', 'access_provider_token'), [
    //           'provider' => ['required', 'string'],
    //           'access_provider_token' => ['required', 'string']
    //       ]);
    //       if ($validator->fails())
    //           return response()->json($validator->errors(), 400);
    //       $provider = $request->provider;
    //       $validated = $this->validateProvider($provider);
    //       if (!is_null($validated))
    //           return $validated;
    //       $providerUser = Socialite::driver($provider)->userFromToken($request->access_provider_token);
    //       $user = User::firstOrCreate(
    //           [
    //               'email' => $providerUser->getEmail()
    //           ],
    //           [
    //               'name' => $providerUser->getName(),
    //           ]
    //       );
    //       $data =  [
    //           'token' => $user->createToken('Sanctom+Socialite')->plainTextToken,
    //           'user' => $user,
    //       ];
    //       return response()->json($data, 200);
    //   }

    //   protected function validateProvider($provider)
    //   {
    //       if (!in_array($provider, ['google'])) {
    //           return response()->json(["message" => 'You can only login via google account'], 400);
    //       }
    //   }



}
