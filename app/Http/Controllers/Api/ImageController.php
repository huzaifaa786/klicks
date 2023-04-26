<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Slid;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function allimages()
    {
 
        $data = Slid::all();
      
        return Api::setResponse('images', $data);
    }
}
