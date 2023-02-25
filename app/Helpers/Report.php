<?php

namespace App\Helpers;

use App\Models\Order;
use Carbon\Carbon;
use stdClass;

class Report
{
    public static function MonthlySale($month, $year ,$id)
    {

        $start = Carbon::createFromDate($year, $month)->startOfMonth();
        $end = Carbon::createFromDate($year, $month)->endOfMonth();

        $days = [];
        while ($start <= $end) {
            $obj = new stdClass();
            $clone = clone $start;
            $obj->date = $start->day;
            $obj->amount = Order::whereBetween('created_at', [$start, $clone->endOfDay()])->where('company_id', $id)->sum('totalpayment');
            $days[] = $obj;
            $start->addDay();
        }
        return $days;
    }

    public static function totalSale($month, $year,$id)
    {

        $start = Carbon::createFromDate($year, $month)->startOfMonth();
        $end = Carbon::createFromDate($year, $month)->endOfMonth();

        $total = 0;
        while ($start <= $end) {
            $clone = clone $start;
            $total += Order::whereBetween('created_at', [$start, $clone->endOfDay()])->where('company_id', $id)->sum('totalpayment');
            $start->addDay();
        }
        return $total;
    }
    public static function weeklyTotalSale($week,$id)
    {
        $start = Carbon::parse($week)->startOfWeek();
        $end = Carbon::parse($week)->endOfWeek();

        $total = 0;
        while ($start <= $end) {
            $clone = clone $start;
            $total += Order::whereBetween('created_at', [$start, $clone->endOfDay()])->where('company_id', $id)->sum('totalpayment');
            $start->addDay();
        }

        return $total;
    }










    public static function YearlySale($year)
    {
        $start = Carbon::createFromDate($year)->startOfYear();
        $end = Carbon::createFromDate($year)->endOfYear();

        $months = [];
        while ($start <= $end) {
            $obj = new stdClass();
            $clone = clone $start;
            $obj->number = $start->month;
            $obj->amount = Order::whereBetween('created_at', [$start, $clone->endOfMonth()])->sum('totalpayment');
            $months[] = $obj;
            $start->addMonth();
        }

        return $months;
    }


    public static function weaklySale($weak,$id)
    {
        $start = Carbon::parse($weak)->startOfweek();
        $end = Carbon::parse($weak)->endOfweek();
        $days = [];
        while ($start <= $end) {
            $obj = new stdClass();
            $clone = clone $start;
            $obj->date = $start->day;
            $obj->amount = Order::whereBetween('created_at', [$start, $clone->endOfday()])->where('company_id', $id)->sum('totalpayment');
            $days[] = $obj;
            $start->addday();
        }

        return $days;
    }






}
