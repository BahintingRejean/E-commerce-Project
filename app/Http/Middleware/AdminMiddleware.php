<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and if their role is 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Allow request to proceed
        }

        // If not an admin, redirect to user dashboard or login page
        return redirect('/user/dashboard')->with('error', 'You do not have access to this page.');
    }
}
