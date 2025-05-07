<?php

use App\Models\Currency;
function getActiveDefaultCurrency(){
    // $defaultCurrency = Currency::where('is_default', 'Yes')->first();
    // $activeCurrencies = Currency::where('is_active','Yes')->get();
    $activeCurrencies = Currency::where('is_active', 'Yes')->get();

    $defaultCurrency = $activeCurrencies->firstWhere('is_default', 'Yes');
    return [
        'defaultCurrency' => $defaultCurrency,
        'activeCurrencies' => $activeCurrencies,
    ];
}