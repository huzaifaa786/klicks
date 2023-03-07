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
       $data= Account::all();
        return Api::setResponse('account', $data);
    }
}
