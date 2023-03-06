<?php

namespace App\Http\Controllers;

use App\Helpers\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function sale(Request $request)
    {
        if ($request->period == 'year') {

            $months = Report::YearlySale($request->year, $request->id);
            return view('Admin/sale/yearlysale')->with('months', $months)->with('id', $request->id);
        } elseif($request->period == 'week') {


            $days = Report::weaklySale($request->week, $request->id);
            return view('Admin/sale/weeklysale')->with('days', $days)->with('id', $request->id);
        }else{

            $days = Report::MonthlySale($request->month, $request->year, $request->id);
            return view('Admin/sale/monthlysale')->with('days', $days)->with('id', $request->id);

        }




    }
    public function sales(Request $request)
    {
        $days = Report::MonthlySale($request->month, $request->year, $request->id);

        return view('Admin/sale/monthlysale')->with('days', $days)->with('id', $request->id);
    }
    public function saless(Request $request)
    {
        $days = Report::weaklySale($request->wwek, $request->id);
        return view('Admin/sale/monthlysale')->with('days', $days);
    }
}
