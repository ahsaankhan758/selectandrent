<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    public function earningSummary()
        {
            return view('admin.financial.earningSummary');
        }
        
    public function transactionHistory()
    {
        return view('admin.financial.transactionHistory');
    }
}
