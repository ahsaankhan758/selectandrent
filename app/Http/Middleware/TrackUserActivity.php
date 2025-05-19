<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserActivity;

class TrackUserActivity
{
   public function handle(Request $request, Closure $next)
{
    $response = $next($request);

    try {
        $user = Auth::user();

        // Track if user is guest OR logged in user with role 'user'
        if (is_null($user) || $user->role === 'user') {
            $userAgent = $request->header('User-Agent');
            $browser = $this->getBrowser($userAgent);

            UserActivity::create([
                'ip_address' => $request->ip(),
                'browser' => $browser,
                'url' => $request->fullUrl(),
                'user_id' => $user ? $user->id : null,
                'method' => $request->method(),
                'referrer' => $request->headers->get('referer'),
                'action_type' => 'view',
                'element_clicked' => null,
            ]);
        }
        // Agar role company ya admin hai to kuch nahi hoga
    } catch (\Exception $e) {
        // Handle exception or ignore
    }

    return $response;
}


    private function getBrowser($userAgent)
    {
        if (strpos($userAgent, 'Chrome') !== false && strpos($userAgent, 'Edg') === false) {
            return 'Chrome';
        } elseif (strpos($userAgent, 'Firefox') !== false) {
            return 'Firefox';
        } elseif (strpos($userAgent, 'Safari') !== false && strpos($userAgent, 'Chrome') === false) {
            return 'Safari';
        } elseif (strpos($userAgent, 'Edg') !== false) {
            return 'Edge';
        } elseif (strpos($userAgent, 'Trident') !== false || strpos($userAgent, 'MSIE') !== false) {
            return 'Internet Explorer';
        } else {
            return 'Unknown';
        }
    }
}
