<?php

namespace App\Models;

use App\Models\CarLocation;
use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{

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
public function vehicle()
{
    return $this->belongsTo(Car::class, 'vehicle_id'); 
}
public function carModel()
{
    return $this->vehicle->carModel(); 
}

public function pickupLocation()
{
    return $this->belongsTo(CarLocation::class, 'pickup_location');
}

public function dropoffLocation()
{
    return $this->belongsTo(CarLocation::class, 'dropoff_location');
}


}
