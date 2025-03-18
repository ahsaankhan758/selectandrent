<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\company;
use App\Models\IP_Address;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
        {
            return redirect('admin/login');
        }

        public function dashboard()
            {
                return view('admin.dashboard');
            }
    // public function dashboard()
    //     {
    //         $total_users = User::All()->count();
    //         $total_admin = User::All()->where('role','admin')->count();
    //         $total_customer = User::All()->where('role','user')->count();
    //         $total_companies = company::All()->count();
    //         return view('admin.dashboard', compact('total_users','total_admin',
    //         'total_customer','total_companies'));
    //     }
    public function bookingDashboard()
        {
            return view('admin.bookingDashboard');
        }
        
}
