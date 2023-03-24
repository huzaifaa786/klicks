<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotiController extends Controller
{
    // public function get(Request $request)

    // {

    //     $notification = Notification::where('company_id', $request->id)->with('user')->orderBy('created_at')->sortBy('created_at')->get();


    //     return Api::setResponse('notification', $notification);
    // }
    public function get(Request $request)
{
    dd($request->company_id);
    $notification = Notification::where('company_id', $request->company_id)
        ->with('user')->with('order')
        ->orderByDesc('created_at')
        ->get();



    return Api::setResponse('notification', $notification);
}
public function getss(Request $request)
{
    $notification = Notification::where('user_id', $request->user_id)
    ->with('order')
    ->orderByDesc('created_at')
    ->get();

return Api::setResponse('notification', $notification);

}

}
