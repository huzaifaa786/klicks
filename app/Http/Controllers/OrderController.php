<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderServices;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function shows(Request $request)
    {

        $data = Order::where('company_id', $request->id)->with('service') ->orderByDesc('created_at')->get();
        return view('Admin.order.totalorder', ['orders' => $data]);
    }
    public function details(Request $request)
    {


        $order = OrderServices::where('order_id', $request->id)->with('service')->get();
        return view('Admin/order/extraservices', ['services' => $order]);
    }
}
