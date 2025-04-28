<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{
    //
    //
    protected $fillable = [
        'booking_id',
        'vehicle_id',
        'pickup_location',
        'dropoff_location',
        'pickup_datetime',
        'dropoff_datetime',
        'duration_days',
        'price_per_day',
        'total_price',
        'driver_required',
        'notes',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function car()
{
    return $this->belongsTo(Car::class, 'car_id');
}
// In BookingItem model
public function vehicle()
{
    return $this->belongsTo(Car::class, 'vehicle_id'); // Assuming 'vehicle_id' is the foreign key
}


}
