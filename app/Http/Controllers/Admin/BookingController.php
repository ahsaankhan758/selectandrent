<?php

namespace App\Http\Controllers\Admin;
use App\Mail\BookingCancelledMail;
use App\Models\Car;
use Auth;
use Carbon\Carbon;
use App\Models\Booking;
use App\Models\BookingItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index(Request $request)
{
    $query = Booking::with(['booking_items.vehicle.carModel', 'user', 'car']);

    // Common filter values
    $companyUserId = $request->user_id ?? null;
    $countryId = $request->country_id ?? null;
    $startDate = $request->start_date ? date('Y-m-d', strtotime($request->start_date)) : null;
    $endDate = $request->end_date ? date('Y-m-d', strtotime($request->end_date)) : null;

    // Apply shared filters
    if ($companyUserId) {
        $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserId) {
            $q->where('user_id', $companyUserId);
        });
    }

    if ($countryId) {
        $companyUserIds = Company::where('country_id', $countryId)->pluck('user_id')->toArray();
        $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserIds) {
            $q->whereIn('user_id', $companyUserIds);
        });
    }

    if ($startDate && $endDate) {
        $query->whereDate('created_at', '>=', $startDate)
              ->whereDate('created_at', '<=', $endDate);
    }

    // Company role filter
    // if (Auth::user()->role === 'company') {
    //     $query->whereHas('booking_items.vehicle', function ($q) {
    //         $q->where('user_id', Auth::id());
    //     });
    // }
    // Company or employee of company filter
$employeeOwner = EmployeeOwner(auth()->id());
if (auth()->user()->role === 'company' || (isset($employeeOwner) && $employeeOwner->role === 'company')) {
    $userId = (auth()->user()->role === 'company') ? auth()->id() : $employeeOwner->id;

    $query->whereHas('booking_items.vehicle', function ($q) use ($userId) {
        $q->where('user_id', $userId);
    });
}


    // Specific filters based on clicked card
    switch ($request->filter) {
        case 'revenue':
            $query->where('payment_status', 'paid')
                  ->whereIn('booking_status', ['completed', 'confirmed']);
            break;

        case 'pending':
            $query->where('payment_status', 'pending')
                  ->where('booking_status', 'pending');
            break;
        
          case 'commission':
        $query->where('payment_status', 'paid')->where('commission', '>', 0);
        break;    

        case 'cancelled_today':
            $query->where('payment_status', 'failed')
                  ->whereDate('created_at', Carbon::today());
            break;

        case 'confirmed':
            $query->where('booking_status', 'confirmed');
            break;

        case 'completed':
            $query->where('booking_status', 'completed');
            break;

        case 'cancelled':
            $query->where('booking_status', 'cancelled');
            break;

        default:
            break;
    }

    $bookings = $query->paginate(10);
    return view('admin.carBooking.carBooking', compact('bookings'));
}

    // public function index(Request $request)
    // {
    //     $query = Booking::with(['booking_items.vehicle.carModel', 'user', 'car']);

    //     if (Auth::user()->role === 'company') {
    //         $query->whereHas('booking_items.vehicle', function ($q) {
    //             $q->where('user_id', Auth::id());
    //         });
    //     }

    //     // For cancelled 
    //         if ($request->payment_status === 'failed' && $request->date === 'today') {
    //             $query->where('payment_status', 'failed')
    //                 ->whereDate('created_at', Carbon::today());
    //         }

    //         // For commission 
    //         if ($request->payment_status === 'paid') {
    //             $query->where('payment_status', 'paid');
    //         }

    //     // for Revenue card
    //         if (in_array($request->status, ['completed', 'confirmed'])) {
    //         $query->where('payment_status', 'paid')
    //             ->whereIn('booking_status', ['completed', 'confirmed']);
    //         }
    //         // for pending card
    //         if (in_array($request->status, ['pending'])) {
    //         $query->where('payment_status', 'pending')
    //             ->whereIn('booking_status', ['pending']);
    //         }

    //     // For confirmed on booking dashboard
    //     if ($request->booking_status === 'confirmed') {
    //         $query->where('booking_status', 'confirmed');
    //     }

    //     // For completed on booking dashboard
    //     if ($request->booking_status === 'completed') {
    //         $query->where('booking_status', 'completed');
    //     }

    //     // For cancelled on booking dashboard
    //     if ($request->booking_status === 'cancelled') {
    //         $query->where('booking_status', 'cancelled');
    //     }

    //     // For pending on booking dashboard
    //     if ($request->booking_status === 'pending') {
    //         $query->where('booking_status', 'pending');
    //     }

    //     $bookings = $query->paginate(10);

    //     return view('admin.carBooking.carBooking', compact('bookings'));
    // }

    // public function carBookingDetail($id)
    // {
    //     $booking = Booking::with(['booking_items.vehicle.carModel', 'user','car'])->findOrFail($id);
    //     return view('admin.carBooking.carBookingDetail', compact('booking'));
    // }
public function carBookingDetail($id, $source)
{
    $booking = Booking::with([
        'booking_items.vehicle.carModel', 
        'booking_items.pickupLocation',
        'booking_items.dropoffLocation',
        'user', 
        'car'
    ])->findOrFail($id);

    return view('admin.carBooking.carBookingDetail', compact('booking', 'source'));
}



//     public function carBookingDetail($id)
// {
//     $booking = Booking::with(['booking_items.vehicle.carModel', 'user', 'car'])->findOrFail($id);

//     if (auth()->user()->role === 'company') {
//         $booking->booking_items = $booking->booking_items->filter(function ($item) {
//             return $item->vehicle && $item->vehicle->user_id == auth()->id();
//         })->values(); 
//     }

//     return view('admin.carBooking.carBookingDetail', compact('booking'));
// }

    public function cancel(Request $request){
            $validated = $request->validate([
                'booking_id' => 'required|exists:bookings,id',
                'cancel_reason' => 'required|string|max:1000',
            ]);
            $booking = Booking::find($validated['booking_id']);
            // if (
            //     $booking->booking_items->isEmpty() ||
            //     Carbon::parse($booking->booking_items->first()->pickup_datetime)->lt(Carbon::now())
            // ) {
            //     return response()->json([
            //         'status' => 'error',
            //         'message' => 'You cannot cancel this booking because the pickup time has already passed.',
            //     ]);
            // }
            $booking->booking_status = 'cancelled';
            $booking->notes = $validated['cancel_reason'];
            $booking->cancelled_by = auth()->id();
            $booking->save();

            if($validated['booking_id']){
                $car = Car::find($booking->booking_items->first()->vehicle->id);
                $car->is_booked = '0';
                $car->save();
                //Notification
                //To Car Owner
                $notificationType = 3; 
                $fromUserId = auth()->id(); 
                $toUserId = $car->user_id;
                $userId = $car->user_id; 
                $message = 'Booking has been Cancelled by ('.auth()->user()->name.') for your Vehicle: ' . $car->lisence_plate. ' With Booking Refernce: '.$booking->booking_reference ;
                saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);
                if(!empty($car->u_employee_id)){
                    $toUserId = $car->u_employee_id;
                    $userId = $car->u_employee_id; 
                    saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);
                }
                //To Customer(User)
                $fromUserId = auth()->id(); 
                $toUserId = $booking->user_id;
                $userId = $booking->user_id; 
                $message = 'Booking has been Cancelled by ('.auth()->user()->name.') for your Vehicle: ' . $car->lisence_plate. ' With Booking Refernce: '.$booking->booking_reference ;
                saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);
            }
            

            Mail::to($booking->user->email)->send(new BookingCancelledMail($booking,  'customer'));
            Mail::to($booking->booking_items->first()?->vehicle?->users->email)->send(new BookingCancelledMail($booking,  'owner'));

            return response()->json([
                'note' => $validated['cancel_reason'],
                'cancelled_by' => auth()->user()->name,
                'cancelled_by_role' => ucfirst(auth()->user()->role),
                'status' => 'success',
                'message' => 'Booking Cancelled',
            ]);
        }
}
