<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function store(Request $request)
    {
        City::create($request->all());
        return redirect()->back();
    }
    public function show()
    {

        $data = City::all();
        return view('Admin.Mall.create', ['citys' => $data]);
    }
    public function shows()
    {

        $data = City::all();
        return view('Admin.city.create', ['citys' => $data]);
    }
    public function delete($id)
    {

        $product = City::find($id);

        $product->delete();
        // toastr()->success('Delete successfully ');
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {



        $city = City::find($id);

        $city->update($request->all());
        // toastr()->success('update successfully ');
        return redirect()->back();
    }
    public function showss()
    {

        $data = City::all();
        return view('Sell.create', ['citys' => $data]);
    }
}
