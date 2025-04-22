<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegister;
use Illuminate\Support\Str;

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
            $token = Str::random(64); 
            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
                'status' => 0,
                'confirmation_token' => $token,
            ]);
            Mail::to($user->email)->send(new UserRegister($user));
            return response()->json([
                'status' => 'Success',
                'message' => 'Registration successful!',
            ]);

        }
    public function confirm($token)
        {
            $user = User::where('confirmation_token', $token)->first();

            if (!$user) {
                return redirect('/')->with('error', 'Invalid or expired confirmation link.');
            }

            $user->status = 1;
            $user->confirmation_token = null; // Optional: clear the token
            $user->save();

            return redirect('/')->with('success', 'Email confirmed! Your account is now active.');
        }
}
