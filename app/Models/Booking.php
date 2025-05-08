<?php

namespace App\Models;

use App\Models\User;
use App\Models\BookingDetail;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phonenumber',
        'city',
        'country',
        'postal_code',
        'billing_addresss',
        'booking_reference',
        'subtotal',
        'total_price',
        'currency',
        'transaction_id',
        'payment_status',
        'booking_status',
        'payment_method',
        'coupon_code',
        'discount_amount',
        'tax_amount',
        'insurance_included',
        'notes',
    ];

    public function booking_items()
    {
        return $this->hasMany(BookingItem::class, 'booking_id', 'id');
    }

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function car()
{
    return $this->belongsTo(Car::class);
}




}
