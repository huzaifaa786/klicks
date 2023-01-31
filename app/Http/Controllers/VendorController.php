<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function store(Request $request)
    {
        Vendor::create(['password' => Hash::make($request->password)]+$request->all());
        return redirect()->back();
    }
}
