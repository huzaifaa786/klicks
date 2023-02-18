<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Extra;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderServices;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {


        $order = Order::create($request->all());

        foreach ($request->services as $key => $service) {
            // dd($service);
            OrderServices::create([

                'order_id' => $order->id,
                'service_id' => $service
            ]);
        }

        return Api::setResponse('order', $order);
    }
    public function vendor(Request $request)
    {
        $order = Order::where('company_id', $request->id)->where('status',0)->with('mall')->with('company')->with('user')->get();


        return Api::setResponse('orders', $order);
    }
    public function detail(Request $request)

    {

        $order = OrderServices::where('order_id',$request->id)->with('service')->get();


        return Api::setResponse('orders', $order);
    }
    public function accept(Request $request){
        $order = Order::find($request->id);
        $order->status = 1;
        $order->save();
        return Api::setResponse('orders', $order);

    }
    public function reject(Request $request){
        $order = Order::find($request->id);
        $order->status = 2;
        $order->save();
        return Api::setResponse('orders', $order);

    }
    public function complete(Request $request){
        $order = Order::find($request->id);
        $order->status = 3;
        $order->save();
        return Api::setResponse('orders', $order);

    }
}
