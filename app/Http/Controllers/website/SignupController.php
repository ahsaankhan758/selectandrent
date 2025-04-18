<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function signup(Request $request)
        {
            // Validate the request
            $request->validate([
                'name' => 'required',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|same:password_confirmation',
                'password_confirmation' => 'min:8',
            ]);
            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user'
            ]);

            return response()->json([
                'status' => 'Success',
                'message' => 'Registration successful!',
            ]);

        }
}
