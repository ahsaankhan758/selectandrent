<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
     protected $fillable = [
        'user_id',
        'car_id',
        'rating',
        'comment'
    ];

    public function cars()
    {
        return $this->hasMany(Car::class, 'user_id','id');
    }
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    } 
}
