<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\ApiValidate;
use App\Http\Controllers\Controller;
use App\Mail\DemoMail;
use App\Models\Company;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = ApiValidate::login($request, User::class);
        // $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = User::find(Auth::guard('web')->user()->id);
            return Api::setResponse('user', $user->withToken());
        } else {
            return Api::setError('Invalid credentials');
        }
    }

    public function register(Request $request)
    {
        $credentials = ApiValidate::register($request, User::class);
        $user = User::find(User::create($credentials)->id);
        return Api::setResponse('user', $user->withToken());
    }


    public function companylogin(Request $request)
    {


        $credentials = ApiValidate::login($request, User::class);
        // $credentials = $request->only('email', 'password');

        if (Auth::guard('company')->attempt($credentials)) {
            $company = Company::find(Auth::guard('company')->user()->id);
            return Api::setResponse('company', $company->withToken());
        } else {
            return Api::setError('Invalid credentials');
        }
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
            return Api::setError('Company not exist on this email');
        }
    }

}
