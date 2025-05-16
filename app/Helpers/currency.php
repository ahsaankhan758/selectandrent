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
    if($symbol_check == 1){
        return $placement === 'after' 
        ? $price . ' ' . $symbol 
        : $symbol . ' ' . $price;
    }else {
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
