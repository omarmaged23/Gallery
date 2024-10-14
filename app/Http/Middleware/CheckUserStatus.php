<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('web')->check()) {

            // Check if the user exists and if the column you want to check is valid (e.g., `is_active` = 1)
            if (!(Auth::guard('web')->user()->active)) {
                Auth::guard('web')->logout();
                return redirect()->route('login')->with('email', 'Your account is inactive. Please contact support.');
            }
        }
        return $next($request);
    }
}
