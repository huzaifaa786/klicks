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
        $start = Carbon::createFromDate($weak)->startOfweak();
        $end = Carbon::createFromDate($weak)->endOfweak();

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
    public static function TwoweaklySale($weak){
        $start = Carbon::createFromDate($weak)->startOfweak();
        $end = Carbon::createFromDate($weak)->subDays(14)
        ();

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



}
