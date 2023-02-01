<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Extra;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $order = Order::create($request->all());


        if ($request->extras) {
            foreach ($request->extras as $key => $extra) {

           
            }
        } else {


            return Api::setResponse('order', $order);
        }


        return Api::setResponse('order', $order);
    }
}
