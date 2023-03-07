<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function show(Request $request)
    {
       $data= Account::find($request->id);
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
}
