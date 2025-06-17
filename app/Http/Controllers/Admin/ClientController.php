<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $customers = User::with(['bookings', 'reviewsReceived'])
                    ->withAvg('reviewsReceived', 'rating') // <- this adds `reviews_received_avg_rating` to each user
                    ->whereHas('bookings')
                    ->get();

        return view('admin.client.clients', compact('customers'));
    }
    
    

    
}
