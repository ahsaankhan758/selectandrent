<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];
    public function car_models()
        {
            return $this->hasMany(CarModel::class, 'car_brand_id', 'id');
        }
}
