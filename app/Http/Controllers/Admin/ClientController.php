<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $customers = User::with('bookings')->has('bookings')->get(); 
        return view('admin.client.clients', compact('customers'));
    }
    
    

    
}
