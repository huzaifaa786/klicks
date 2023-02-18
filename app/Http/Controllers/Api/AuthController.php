<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\ApiValidate;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $data = Company::where( 'api_token',$request->api_token)->first();

        $data->update([
            'password'=>$request->password]);
        // toastr()->success('update successfully ');
        return Api::setResponse('update', $data);
    }
    public function forget(Request $request)
    {

        $data = Company::where( 'email',$request->email)->first();


        // toastr()->success('update successfully ');
        return Api::setResponse('company', $data->withToken());
    }

}
