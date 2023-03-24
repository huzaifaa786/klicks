<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Copen;
use Illuminate\Http\Request;

class CopenController extends Controller
{
    public function shows()
    {

        $data = Company::all();
        return view('Admin.copen.copen', ['companys' => $data]);
    }
    public function store(Request $request)
    {

        Copen::create($request->all());
        return redirect()->back();
    }
    public function delete($id)
    {

        $product = Copen::find($id);

        $product->delete();
        // toastr()->success('Delete successfully ');
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $city = Copen::find($id);

        $city->update($request->all());
        // toastr()->success('update successfully ');
        return redirect()->back();
    }
    public function show()
    {

        $data = Copen::all();
        return view('Admin.copen.copen', ['copens' => $data]);

}
}
