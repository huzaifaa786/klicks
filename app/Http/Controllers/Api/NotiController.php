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
    $notification = Notification::where('company_id', $request->id)
        ->with('user')
        ->orderBy('created_at')
        ->get();

    $notification = $notification->sortBy('created_at');

    return Api::setResponse('notification', $notification);
}
public function getss(Request $request)
{
    $notification = Notification::where('user_id', $request->id)
        
        ->orderBy('created_at')
        ->get();

    $notification = $notification->sortBy('created_at');

    return Api::setResponse('notification', $notification);
}

}
