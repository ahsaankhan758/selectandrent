<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'car_category_id',
        'car_location_id',
        'car_model_id',
        'year',
        'beam',
        'transmission',
        'rent',
        'seats',
        'weight',
        'doors',
        'mileage',
        'engine_size',
        'detail',
        'luggage',
        'drive',
        'fuel_economy',
        'fuel_type',
        'exterior_color',
        'interior_color',
        'lisence_plate',
        'thumbnail',
        'images',
        'features',
    ];
    protected $casts = [
        'images' => 'array', 
    ];
    
    
    public function car_categories()
        {
            return $this->belongsTo(CarCategory::class, 'car_category_id', 'id');
        }
    public function car_locations()
        {
            return $this->belongsTo(CarLocation::class, 'car_location_id', 'id');
        }
    public function car_models()
        {
            return $this->belongsTo(CarModel::class, 'car_model_id', 'id');
        }    
}
