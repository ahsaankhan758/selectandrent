<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarLocation extends Model
{
    protected $fillable = [
        'city_id',
        'area',
        'latitude',
        'longitude',
        'postal_code',
        'status'
    ];
    public function cars()
        {
            return $this->hasMany(Car::class, 'car_location_id', 'id');
        }

        public function city()
        {
            return $this->belongsTo(City::class, 'city_id');
        }

}
