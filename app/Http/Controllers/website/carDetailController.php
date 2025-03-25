<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class carDetailController extends Controller
{
    public function cardetailView()
    {
        return view('website.car-detail'); 
    }
}
