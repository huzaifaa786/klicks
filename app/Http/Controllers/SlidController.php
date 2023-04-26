<?php

namespace App\Http\Controllers;

use App\Models\Slid;
use Illuminate\Http\Request;

class SlidController extends Controller
{
    public function store(Request $request)
    {

        Slid::create($request->all());
        return redirect()->back();
    }
    public function show()
    {

        $data = Slid::all();
        return view('Admin.slidimage.slidimage', ['images' => $data]);
    }
    public function delete( $id)
    {
        dd($id);
        $product = Slid::find($id);

        $product->delete();
        // toastr()->success('Delete successfully ');
        return redirect()->back();
    }
    public function update(Request $request,)
    {

        // dd($request->file);
        $mall = Slid::find($request->id);

        $mall->update($request->all());
        // toastr()->success('update successfully ');
        return redirect()->back();
    }

}
