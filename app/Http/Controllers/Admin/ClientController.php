<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{

    // public function index()
    // {
    //     $customers = User::with(['bookings', 'reviewsReceived'])
    //                 ->withAvg('reviewsReceived', 'rating') 
    //                 ->whereHas('bookings')
    //                 ->get();

    //     return view('admin.client.clients', compact('customers'));
    // }
  public function index(Request $request)
{
    $query = User::with(['bookings.booking_items.vehicle', 'reviewsReceived'])
    ->withAvg('reviewsReceived', 'rating') 
    ->withCount('reviewsReceived')         
    ->whereHas('bookings');

    $companyUserId = $request->user_id ?? null;
    $countryId = $request->country_id ?? null;
    $startDate = $request->start_date ? date('Y-m-d', strtotime($request->start_date)) : null;
    $endDate = $request->end_date ? date('Y-m-d', strtotime($request->end_date)) : null;

    // Company and country filter (optional)
    $query->whereHas('bookings.booking_items.vehicle', function ($q) use ($companyUserId, $countryId) {
        if ($companyUserId) {
            $q->where('user_id', $companyUserId);
        }

        if ($countryId) {
            $companyUserIds = Company::where('country_id', $countryId)->pluck('user_id')->toArray();
            $q->whereIn('user_id', $companyUserIds);
        }
    });

    // Booking date filter (optional)
    if ($startDate && $endDate) {
        $query->whereHas('bookings', function ($q) use ($startDate, $endDate) {
            $q->whereDate('created_at', '>=', $startDate)
              ->whereDate('created_at', '<=', $endDate);
        });

    }

    $customers = $query->get();

    return view('admin.client.clients', compact('customers'));
}


    

    
}
