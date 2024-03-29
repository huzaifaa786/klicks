
<?php

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NotifictionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Auth::user();
        return view('admin.notification.index')->with('notifications',$notifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notifications = Auth::user();
     foreach ($notifications as $key => $notification) {
         $notification->update([
             'read_at' => Carbon::now()
         ]);
     }
        // toastr()->success('All Notification Marked Read');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        $notification->update([
            'read_at' => Carbon::now()
        ]);
        // toastr()->success('Mark Read Successfully','Done');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
    public function get(Request $request)

    {

        $notification = Notification::where('company_id', $request->id)->with('user')->orderBy('created_at')->sortBy('created_at')->get();


        return Api::setResponse('notification', $notification);
    }

    public function check(){
        $has_new = Notification::where('user_id',Auth::user()->id)->where('is_read', false)->count();
        if($has_new > 0)
            return Api::setResponse('exist',true);
        return Api::setResponse('exist',false);
    }


}
