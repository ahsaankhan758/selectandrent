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


function convertPrice($amount, $round = 2, $symbol_check = 1)
{

    $amount = str_replace(',', '', $amount);

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

    if (!$defaultCurrency) {
        $rate = 1;
        $symbol = '';
        $placement = 'before';
    } else {
        $rate = is_numeric($defaultCurrency->rate) ? (float) $defaultCurrency->rate : 1;
        $symbol = $defaultCurrency->symbol ?? $defaultCurrency->code ?? '';
        $placement = $defaultCurrency->symbol_placement ?? 'before';
    }

    $amount = (float) $amount;
    $round = (int) $round;

    $price = round($rate * $amount, $round);

    if ($symbol_check == 1) {
        return $placement === 'after'
            ? $price . ' ' . $symbol
            : $symbol . ' ' . $price;
    } else {
        return $price;
    }
}


// Set Default Currency To EUR and Create 2 More For Database Record
function setDefaultCurreny()
    {
        
        $defaultCurreny = Currency::where('code','EUR')->first();
        if(!empty($defaultCurreny))
            {
                $defaultCurreny->is_default = 'Yes';
                $defaultCurreny->save();
                echo $defaultCurreny->code;
            }
        else
            {
           function createCurrency(array $data) {
                $currency = new Currency;
                $currency->name = $data['name'];
                $currency->symbol = $data['symbol'];
                $currency->code = $data['code'];
                $currency->rate = $data['rate'];
                $currency->decimals = $data['decimals'];
                $currency->symbol_placement = $data['symbol_placement'];
                $currency->primary_order = $data['primary_order'];
                $currency->is_default = $data['is_default'];
                $currency->is_active = $data['is_active'];
                $currency->save();

                return $currency;
            }

            $currencies = [
                [
                    'name' => 'EUR',
                    'symbol' => '€',
                    'code' => 'EUR',
                    'rate' => '1',
                    'decimals' => '2',
                    'symbol_placement' => 'before',
                    'primary_order' => '1',
                    'is_default' => 'Yes',
                    'is_active' => 'Yes',
                ],
                [
                    'name' => 'GBP',
                    'symbol' => '£',
                    'code' => 'GBP',
                    'rate' => '0.81',
                    'decimals' => '2',
                    'symbol_placement' => 'before',
                    'primary_order' => '1',
                    'is_default' => 'No',
                    'is_active' => 'Yes',
                ],
                [
                    'name' => 'AED',
                    'symbol' => 'AED',
                    'code' => 'AED',
                    'rate' => '4.56',
                    'decimals' => '2',
                    'symbol_placement' => 'before',
                    'primary_order' => '1',
                    'is_default' => 'No',
                    'is_active' => 'Yes',
                ],
            ];

            foreach ($currencies as $data) {
                $currency = createCurrency($data);
                if ($currency->code === 'EUR')
                    echo $currency->code . PHP_EOL;
            }

        }
    }

    function administratorConvertCurrency($amount, $existCode, $setCode, $round = 2, $symbol_check = 1)
    {
        // Get rate of existing currency
        $existCurrency = Currency::where('code', $existCode)->first();
        $existRate = $existCurrency && is_numeric($existCurrency->rate) ? (float) $existCurrency->rate : 1;

        // Get rate and symbol of target currency
        $setCurrency = Currency::where('code', $setCode)->first();
        $setRate = $setCurrency && is_numeric($setCurrency->rate) ? (float) $setCurrency->rate : 1;
        $symbol = $setCurrency->symbol ?? $setCurrency->code ?? '';
        $placement = $setCurrency->symbol_placement ?? 'before';

        // Convert amount
        $amount = (float) $amount;
        $round = (int) $round;
        $price = round(($amount / $existRate) * $setRate, $round);
        // print_r($price);die;
        if ($symbol_check == 1) {
            return ($placement === 'before')? $symbol . ' ' . $price : $price . ' ' . $symbol;
        } else {
            return (float) $price; // cast only here when you want number
        }
    }



