<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfirmBookingController extends Controller
{
    public function confirmBookingView()
    {
        return view('website.booking-confirm'); 
    }
}
