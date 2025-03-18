<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarLocation extends Model
{
    protected $fillable = [
        'city',
        'status'
    ];
    public function cars()
        {
            return $this->hasMany(Car::class, 'car_location_id', 'id');
        }
}
