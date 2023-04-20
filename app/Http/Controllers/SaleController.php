<?php

namespace App\Http\Controllers;

use App\Helpers\Report;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function sale(Request $request)
    {
        if ($request->period == 'year') {

            $months = Report::YearlySale($request->year, $request->id);
            return view('Admin/sale/yearlysale')->with('months', $months)->with('id', $request->id);
        } elseif ($request->period == 'week') {


            $days = Report::weaklySale($request->week, $request->id);
            return view('Admin/sale/weeklysale')->with('days', $days)->with('id', $request->id);
        } else {

            $days = Report::MonthlySale($request->month, $request->year, $request->id);
            return view('Admin/sale/monthlysale')->with('days', $days)->with('id', $request->id);
        }
    }//////////////////company//////////////
    public function sales(Request $request)
    {
        $days = Report::MonthlySale($request->month, $request->year, $request->id);

        return view('Admin/totalsale/monthlysale')->with('days', $days);
    }
    public function yearsales(Request $request)
    {
        $months = Report::YearlySale( $request->year, $request->id);

        return view('Admin/totalsale/yearlysale')->with('months', $months);
    }
    public function saless(Request $request)
    {
        $days = Report::weaklySale($request->wwek, $request->id);
        return view('Admin/totalsale/weeklysale')->with('days', $days);
    }
/////////////total/////////////////////////////
    public function yearlytotal(Request $request)
    {
        $months = Report::totalYearlySale($request->year);
        return view('Admin/totalsale/yearlysale')->with('months', $months);
    }
    public function monthlytotal(Request $request)
    {
        $days = Report::totalMonthlySale($request->month, $request->year);
        return view('Admin/totalsale/monthlysale')->with('days', $days);
    }
    public function weektotal(Request $request)
    {
        $days = Report::totalweaklySale($request->week);
        return view('Admin/totalsale/weeklysale')->with('days', $days);
    }

    public function allsales(){
        $sales = Order::where('status', 3)->get();
        return view('Admin.sale.index')->with('sales',$sales);
    }
    
    public function companysales(Request $request){
        $sales = Order::where('status', 3)->where('company_id',$request->id)->get();
        return view('Admin.sale.index')->with('sales',$sales)->with('id',$request->id);
    }
}