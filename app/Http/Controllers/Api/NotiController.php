<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotiController extends Controller
{
    // public function get(Request $request)

    // {

    //     $notification = Notification::where('company_id', $request->id)->with('user')->orderBy('created_at')->sortBy('created_at')->get();


    //     return Api::setResponse('notification', $notification);
    // }
    public function get(Request $request)
    {

        $notification = Notification::where('company_id', $request->company_id)
            ->with('user')->with('order')->with('mall')
            ->orderByDesc('created_at')
            ->get();



        return Api::setResponse('notification', $notification);
    }
    public function getss(Request $request)
    {
        $notification = Notification::where('user_id', $request->user_id)
            ->with('order')->with('mall')
            ->orderByDesc('created_at')
            ->get();

        return Api::setResponse('notification', $notification);
    }
    public function check()
    {
        $has_new = Notification::where('company_id',Auth::guard('vendor_api')->user()->id)->where('is_read', false)->count();
        if($has_new > 0)
            return Api::setResponse('exist',true);
        return Api::setResponse('exist',false);
    }
     public function userCheck()
    {
        $has_new = Notification::where('user_id',Auth::guard('api')->user()->id)->where('is_read', false)->count();
        if($has_new > 0)
            return Api::setResponse('exist',true);
        return Api::setResponse('exist',false);
    }
    public function read(Request $request)
    {
        $noitification = Notification::find($request->notification_id);
        if($noitification){
            $noitification->update([
                'read' => true
            ]);
            return Api::setMessage('notifcation read');
        }
            return Api::setMessage('notifcation not found');
    }
}