<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [
        'user_id',
        'booking_reference',
        'subtotal',
        'total_price',
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
}
