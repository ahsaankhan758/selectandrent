<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'user_id',
        'u_employee_id',
        'car_category_id',
        'car_location_id',
        'car_model_id',
        'year',
        'transmission',
        'rent',
        'currency',
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
        'is_featured',
        'status',
        'date_added',
        'upload_type',
        'upload_type',
        'upload_type',
        'upload_type',
        'advance_deposit',
        'min_age',
        'rent_type',
    ];
    protected $casts = [
        'images' => 'array', 
        'features' => 'array',
    ];
    
    public function u_employees()
    {
        return $this->belongsTo(User::class, 'u_employee_id', 'id');
    }

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
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    } 

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function carModel()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }
    
    public function company()
    {
        return $this->hasOne(company::class, 'user_id', 'user_id');
    }

public function booking_items()
{
    return $this->hasMany(BookingItem::class, 'vehicle_id');
}

}
