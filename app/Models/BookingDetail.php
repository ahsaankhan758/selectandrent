<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $fillable = [
        'booking_id', 'vehicle_id', 'pickup_location', 'dropoff_location',
        'pickup_datetime', 'dropoff_datetime', 'duration_days',
        'price_per_day', 'total_price', 'driver_required', 'notes'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
