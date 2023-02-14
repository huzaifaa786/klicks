<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Extra;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderServices;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {

        $order = Order::create($request->all());
       foreach ($request->services as $key => $service) {
        OrderServices::create([

            'order_id' => $order->id,
            'service_id' => $service['']
        ]);


        return Api::setResponse('order', $order);
       }





}

}
