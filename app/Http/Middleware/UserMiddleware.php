<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::where('email', $request->input('email'))->first();

        if (!empty($user)) {
            if ($user->role === 'user') {
                $request->merge([
                    'user_role' => $user->role,
                    'user_status' => $user->status,
                ]);
            } else {
                $request->merge([
                    'user_role' => '',
                    'user_status' => $user->status,
                ]);
            }

            return $next($request);
        }

        // If user is not found, still return the request with default merged values
        $request->merge([
            'user_role' => '',
            'user_status' => '',
        ]);

        return $next($request);
    }

}
