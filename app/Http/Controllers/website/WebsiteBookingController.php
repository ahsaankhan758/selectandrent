<?php

namespace App\Http\Controllers\Website;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::paginate(10); 
        return view('website.booking', compact('bookings'));
    }
    
}
