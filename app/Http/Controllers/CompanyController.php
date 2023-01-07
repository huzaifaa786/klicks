<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Mall;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store(Request $request){

        Company ::create($request->all());
         return redirect()->back();
     }
     public function show(){

        $data= Company::all();
        return view('Admin.Company.companylist',['companys'=>$data]);


}
public function delete($id)
{

    $product = Company::find($id);

    $product->delete();
    // toastr()->success('Delete successfully ');
    return redirect()->back();
}
public function update(Request $request, $id)
{

    // dd($id,$request->all());
    $company = Company::find($id);

    $company->update($request->all());
    // toastr()->success('update successfully ');
    return redirect()->back();
}
public function showss(Request $request)
    {

        $company = Company::where('mall_id', $request->id)->get();

        return response()->json([
            'companys' => $company
        ]);
    }
}
