<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarBookingController extends Controller
{
    public function carBookingView()
    {
        return view('website.car-booking'); 
    }
}
