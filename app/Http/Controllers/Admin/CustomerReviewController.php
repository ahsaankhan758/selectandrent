<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingItem;
use App\Models\Car;
use App\Models\CustomerReview;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class CustomerReviewController extends Controller
{
    public function index()
    {
        
    $loggedInUser = Auth::user();
    $owner = EmployeeOwner($loggedInUser->id);

    if( $loggedInUser->role === 'admin' || isset($owner) && $owner->role === 'admin'){
        $query = CustomerReview::query()->orderBy('created_at', 'desc');

    } elseif ($loggedInUser->role === 'company') {
        $employeeUserIds = Employee::where('owner_user_id', $loggedInUser->id)->pluck('e_user_id');
        $allUserIds = $employeeUserIds->push($loggedInUser->id);

        $carIds = Car::whereIn('user_id', $allUserIds)->pluck('id');

        $bookingIds = BookingItem::whereIn('vehicle_id', $carIds)->pluck('booking_id');

        $query = CustomerReview::whereIn('booking_id', $bookingIds)
            ->orderBy('created_at', 'desc');

    } elseif (isset($owner) && $owner->role === 'company' && $loggedInUser->role === 'employee') {
        $carIds = Car::where('u_employee_id', $loggedInUser->id)->pluck('id');

        $bookingIds = BookingItem::whereIn('vehicle_id', $carIds)->pluck('booking_id');

        $query = CustomerReview::whereIn('booking_id', $bookingIds)
            ->orderBy('created_at', 'desc');
    }


        $customerReviews = $query->paginate(20);
        return view('admin.review.customerReview', compact('customerReviews'));
    }
    public function store(Request $request)
     {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'customer_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1500',
        ]);

        $existingReview = CustomerReview::where('booking_id', $validated['booking_id'])->first();

        if ($existingReview) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have already reviewed this Booking.',
            ]); 
        }
        
        CustomerReview::create([
            'user_id' => auth()->id(),
            'c_user_id' => $validated['customer_id'],
            'booking_id' => $validated['booking_id'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        // Step 3: Send notification to vehicle company 
         $notificationType = 1; // review save against vehicle car
         $fromUserId = auth()->id(); // logged in user
         $toUserId = $validated['customer_id'];
         $userId = $validated['customer_id']; 
         $message = 'A new review from ('.auth()->user()->name.') has been submitted for You.';
         saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);

        


        return response()->json([
            'status' => 'success',
            'message' => 'Review submitted successfully.',
        ]);
     }
}
