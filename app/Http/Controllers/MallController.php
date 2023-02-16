<?php

namespace App\Http\Controllers;

use App\Models\Mall;
use Illuminate\Http\Request;

class MallController extends Controller
{

    public function store(Request $request)
    {

        Mall::create($request->all());
        return redirect()->back();
    }
    public function show()
    {

        $data = Mall::all();
        return view('Admin.Mall.showmall', ['malls' => $data]);
    }
    public function shows()
    {

        $data = Mall::all();
        return view('Admin.Company.create', ['malls' => $data]);
    }
    public function delete($id)
    {
        
        $product = Mall::find($id);

        $product->delete();
        // toastr()->success('Delete successfully ');
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {

        // dd($id,$request->all());
        $mall = Mall::find($id);

        $mall->update($request->all());
        // toastr()->success('update successfully ');
        return redirect()->back();
    }
    public function showss(Request $request)
    {

        $mall = Mall::where('city_id', $request->id)->get();

        return response()->json([
            'malls' => $mall
        ]);
    }
}
