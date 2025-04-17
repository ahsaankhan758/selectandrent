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
            $userRole = User::where('email', $request['email'])->value('role');
            if($userRole == 'user')
                {
                    $request->merge(['user_role' => $userRole]);
                    return $next($request);
                }
                
            else
                {
                    $request->merge(['user_role' => '']);
                    return $next($request);
                }
        }
}
