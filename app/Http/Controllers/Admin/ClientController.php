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
                    ->withAvg('reviewsReceived', 'rating')
                    ->withCount('reviewsReceived') // This gives you reviews_received_count
                    ->whereHas('bookings')
                    ->get();

        return view('admin.client.clients', compact('customers'));
    }
    
    

    
}
