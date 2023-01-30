<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Mall;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function allCities()
    {
        $data = City::all();
        return Api::setResponse('cities', $data);
    }
    public function cityMalls(Request $request)
    {
        $data = Mall::where('city_id',$request->city_id)->get();
        return Api::setResponse('malls', $data);
    }

}
