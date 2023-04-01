<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function show(Request $request)
    {
        $user=User::  where('api_token',$request->api_token)->first();
       $data= Account::where('user_id',$user->id)->first();
        return Api::setResponse('account', $data);
    }

    public function add(Request $request)
    {
       $data= Account::where('user_id',$request->id)->first();
       $data->update([
        'balance' => $request->balance + $data->balance
    ]);

        return Api::setResponse('account', $data);
    }
    public function subtract(Request $request)
    {
       $data= Account::where('user_id',$request->id)->first();
       $data->update([
        'balance' => $data->balance-$request->balance
    ]);

        return Api::setResponse('account', $data);
    }
}
