<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
      $data=  Service::create($request->all());
        return Api::setResponse('services', $data);
    }

    public function show(Request $request)
    {
        $data = Service::where('company_id',$request->company_id)->get();
        return Api::setResponse('services', $data);
    }

}
