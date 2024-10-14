<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // Check if the user is authenticated for either 'admin' or 'web'
            if ($guard === 'admin' && Auth::guard($guard)->check()) {
                return to_route('admin.dashboard');
            } elseif ($guard === 'web' && Auth::guard($guard)->check()) {
                return redirect('/home'); // Change to your user home route
            }
        }

        return $next($request);
    }
}
