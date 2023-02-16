<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function shows()
    {

        $data = Order::all();
        return view('Admin.order.totalorder', ['orders' => $data]);
    }
}
