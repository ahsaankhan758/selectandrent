<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = ['user_id', 'vehicle_id', 'booking_id', 'rating', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


     public function vehicle()
    {
        return $this->belongsTo(Car::class, 'vehicle_id'); 
    }

     public function carModel()
    {
        return $this->vehicle->carModel(); 
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
