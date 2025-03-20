<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarListingController extends Controller
{
    public function carListingView()
    {
        return view('website.car-listing'); 
    }
}
