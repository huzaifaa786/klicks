<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderServices;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function shows()
    {

        $data = Order::all();
        return view('Admin.order.totalorder', ['orders' => $data]);
    }
    public function details(Request $request)
{

    $order =OrderServices:: where('order_id', $request->id)->get();
    return view('Admin/order/extraservices', ['services' => $order]);
}
}
