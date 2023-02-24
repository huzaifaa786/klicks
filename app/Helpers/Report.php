<?php
namespace App\Helpers;

use App\Models\Order;
use Carbon\Carbon;
use stdClass;

class Report
{
    public static function MonthlySale($month, $year){

        $start = Carbon::createFromDate($year,$month)->startOfMonth();
        $end = Carbon::createFromDate($year,$month)->endOfMonth();

        $days = [];
        while($start <= $end){
            $obj = new stdClass();
            $clone = clone $start;
            $obj->date = $start->day;
            $obj->amount = Order::whereBetween('created_at',[$start,$clone->endOfDay()])->sum('totalpayment');
            $days[] = $obj;
            $start->addDay();
        }
        return $days;
    }








    public static function YearlySale($year){
        $start = Carbon::createFromDate($year)->startOfYear();
        $end = Carbon::createFromDate($year)->endOfYear();

        $months = [];
        while($start <= $end){
            $obj = new stdClass();
            $clone = clone $start;
            $obj->number = $start->month;
            $obj->amount = Order::whereBetween('created_at',[$start,$clone->endOfMonth()])->sum('totalpayment');
            $months[] = $obj;
            $start->addMonth();
        }

        return $months;
    }


    public static function weaklySale($weak){
        $start = Carbon::parse($weak)->startOfweek();
        $end = Carbon::parse($weak)->endOfweek();

        $days = [];
        while($start <= $end){
            $obj = new stdClass();
            $clone = clone $start;
            $obj->number = $start->day;
            $obj->amount = Order::whereBetween('created_at',[$start,$clone->endOfday()])->sum('totalpayment');
            $months[] = $obj;
            $start->addday();
        }

        return $days;
    }
 
    public static function TwoweaklySale($weeksAgo = 0) {
        $start = Carbon::now()->subWeeks($weeksAgo)->startOfWeek();
        $end = Carbon::now()->subWeeks($weeksAgo)->endOfWeek();

        $days = [];
        while($start <= $end) {
            $obj = new stdClass();
            $clone = clone $start;
            $obj->number = $start->day;
            $obj->amount = Order::whereBetween('created_at', [$start, $clone->endOfDay()])->sum('totalpayment');
            $days[] = $obj;
            $start->addDay();
        }

        return $days;
    }




}
