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
        $coupons = Copen::where('company_id', $request->company_id)->where('copen', $request->coupon)->first();

        if ($coupons != null) {
            return Api::setResponse('coupons', $coupons);
        } else {
            return Api::setError('coupon not exist for this company');
        }
    }
}
