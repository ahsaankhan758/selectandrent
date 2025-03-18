<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];
    public function cars()
        {
            return $this->hasMany(Car::class, 'car_category_id', 'id');
        }
}
