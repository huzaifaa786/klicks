<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Copen;
use Illuminate\Http\Request;

class CopenController extends Controller
{
    public function coupon(Request $request)
    {
        $order = Copen::where('company_id', $request->company_id)->get();


        return Api::setResponse('coupons', $order);
    }
}
