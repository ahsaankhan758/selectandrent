<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class usersignupController extends Controller
{
     public function showSignupForm()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.signup.usersignup', compact('users'));
    }
}
