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

function convertPrice($amount, $round = 2)
{
    // Get session values
    $code = session('defaultCurrencyCode');
    $name = session('defaultCurrencyName');

    $query = Currency::query();

    if (!empty($code)) {
        $query->where('code', $code);
    } elseif (!empty($name)) {
        $query->where('name', $name);
    } else {
        $query->where('is_default', 'Yes');
    }

    $defaultCurrency = $query->first();

    $rate = $defaultCurrency->rate ?? 1;
    $symbol = $defaultCurrency->symbol ?? $defaultCurrency->code ?? '';
    $placement = $defaultCurrency->symbol_placement ?? 'before';
    
    $price = round($rate * $amount, $round);

    return $placement === 'after' 
        ? $price . ' ' . $symbol 
        : $symbol . ' ' . $price;
}

