<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Mall;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function show()
    {


        $data = City::all();
        return Api::setResponse('cities', $data);
    }
    public function shows($id)
    {


        $data = Mall::find($id);
        return Api::setResponse('mall', $data);
    }

}
