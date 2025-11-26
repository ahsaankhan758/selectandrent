<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to Google's OAuth page.
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google and log them in.
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/')
                ->with('statusDanger', 'Unable to login with Google. Please try again.');
        }

        $googleId = $googleUser->getId();
        $email = $googleUser->getEmail();
        $name = $googleUser->getName() ?: ($googleUser->getNickname() ?: 'Google User');

        if (!$email) {
            return redirect('/')
                ->with('statusDanger', 'Google account does not have a public email address.');
        }

        // First try to find by google_id
        $user = User::where('google_id', $googleId)->first();

        if (!$user) {
            // Then try to find by email
            $user = User::where('email', $email)->first();
        }

        if ($user) {
            // Do not allow using Google to log into non-website roles
            if ($user->role && $user->role !== 'user') {
                return redirect('/')
                    ->with('statusDanger', 'This email is already used for a different account type.');
            }

            // Attach google_id if missing
            if (!$user->google_id) {
                $user->google_id = $googleId;
            }

            // Ensure website user is active
            if ((int) $user->status !== 1) {
                $user->status = 1;
                $user->confirmation_token = null;
            }

            $user->save();
        } else {
            // Create a new website user
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'google_id' => $googleId,
                // Random password; user authenticates via Google
                'password' => Str::random(32),
                'role' => 'user',
                'status' => 1,
                'confirmation_token' => null,
            ]);
        }

        // Log the user in for the current session (no persistent remember cookie)
        Auth::login($user);

        // Log activity using existing helper
        activityLog(
            $user->id,
            $user->name . ' LoggedIn with Google. User Role Is User',
            'LoggedIn',
            'Website'
        );

        return redirect()->intended('/');
    }
}


