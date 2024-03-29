<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        $data =  Service::create($request->all());
        return Api::setResponse('services', $data);
    }

    public function show(Request $request)
    {

        $company = Company::find($request->id);

        $data = $company->services;

        return Api::setResponse('services', $data);
    }
    public function get(Request $request)
    {
        // dd($request->api_token);
        $data = Company::where('api_token', $request->api_token)->first();


        return Api::setResponse('company', $data);
    }
    public function del(Request $request)
    {

        $data = Service::find($request->id);

        $data->delete();

        return Api::setResponse('true', true);
    }
    public function edit(Request $request, )
    {



        $data = Service::find($request->id);

        $data->update($request->all());
        // toastr()->success('update successfully ');
        return Api::setResponse('service', $data);
    }
    public function changeprice(Request $request, )
    {



        $data = Company::find($request->id);

        $data->update([
            'suv_price' => $request->suv_price,
            'sedan_price'=> $request->sedan_price
        ]);
        // toastr()->success('update successfully ');
        return Api::setResponse('service', $data);
    }
}
