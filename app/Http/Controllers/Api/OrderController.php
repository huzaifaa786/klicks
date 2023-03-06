<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\NotificationHelper;
use App\Helpers\Report;
use App\Http\Controllers\Controller;
use App\Models\Extra;
use App\Models\Item;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderServices;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use stdClass;

class OrderController extends Controller
{
    public function order(Request $request)
    {

        $order = Order::create($request->all());

        if ($request->services) {
            foreach ($request->services as $key => $service) {

                OrderServices::create([

                    'order_id' => $order->id,
                    'service_id' => $service
                ]);
            }
        }

        $notification = Notification::create([
            // 'rider_id' => '$rider->id',
            'firebase_token' => 'fqQBgEkZSoeIzsHS3AiY5Z:APA91bHo1soQSiILXdyzIKW5Rwpi1GGhOZ4WIh0cP6Q91cvHXIfqUpu33fC-i7NI__abermI2UJBSp6Bm-QvJl0XOhNtXEAi8nl0ubb12GStT9HrU2T6K7nZ2hg7tuhgfBwZSy5PfiU4',
            'title' => 'New Order Placed',
            'body' => 'Click to View',
        ]);
        NotificationHelper::send($notification);

        return Api::setResponse('order', $order);
    }
    public function vendor(Request $request)
    {
        $order = Order::where('company_id', $request->id)->with('mall')->with('company')->with('user')->get();


        return Api::setResponse('orders', $order);
    }
    public function detail(Request $request)

    {

        $order = OrderServices::where('order_id', $request->id)->with('service')->get();


        return Api::setResponse('orders', $order);
    }
    public function accept(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 1;
        $order->save();
        return Api::setResponse('orders', $order);
    }
    public function reject(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 2;
        $order->save();
        return Api::setResponse('orders', $order);
    }
    public function complete(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 3;
        $order->save();
        return Api::setResponse('orders', $order);
    }
    public function saleorder(Request $request)
    {
        $order = Order::where('company_id', $request->id)->where('status', 3)->with('user')->get();


        return Api::setResponse('orders', $order);
    }
    public function saleofmonth(Request $request)
    {

        $days = [];
        $totalSale = 0;


        if ($request->format == 'month') {
            $month = Carbon::parse($request->date);
            $days = Report::MonthlySale($month->month, $request->year ,$request->id);
            $totalSale = Report::totalSale($month->month,$request->year,$request->id);
        }
        else  {

            $week = Carbon::parse($request->date);
            $days = Report::weaklySale($week,$request->id);
            $totalSale = Report::weeklyTotalSale($week,$request->id);

        }

        $response = new stdClass;
        $response->days = $days;
        $response->totalSale = $totalSale;
        return response()->json($response);
    }
    public function userorder(Request $request)
    {
        $data = Order::where('user_id',$request->id)->with('company')->with('mall')->with('user')->get();
        return Api::setResponse('orders', $data);
    }
}
