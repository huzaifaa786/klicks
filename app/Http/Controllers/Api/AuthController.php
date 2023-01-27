<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\ApiValidate;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = ApiValidate::login($request, User::class);

        if (Auth::guard('user')->attempt($credentials)) {
            $user = User::find(Auth::guard('user')->user()->id);
            $user->account;
            return Api::setResponse('user', $user->withToken());
        } else {
            return Api::setError('Invalid credentials');
        }
    }

    public function register(Request $request)
    {
        $user = User::create([
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'email' => $request->email,
            'phone' =>$request->phone,
        ]);
        return Api::setResponse('user', $user);
    }
}
