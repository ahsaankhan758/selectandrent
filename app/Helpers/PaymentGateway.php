<?php

use App\Models\PaymentGateways;
use Illuminate\Support\Facades\File;

if (!function_exists('payment')) {
    function payment($paymentMethod = '')
    {
        if (empty($paymentMethod)) {
            return null;
        }

        return PaymentGateways::where('name', $paymentMethod)->first();
    }
}

        