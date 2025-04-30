<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $fillable = [
        'car_brand_id',
        'name',
        'status'
    ];
    public function car_brands()
        {
            return $this->belongsTo(CarBrand::class, 'car_brand_id', 'id');
        }
        public function cars()
        {
            return $this->hasMany(Car::class, 'car_model_id', 'id');
        }
}
