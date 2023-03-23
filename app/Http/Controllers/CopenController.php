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
}
