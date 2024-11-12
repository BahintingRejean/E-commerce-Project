<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user using the provided credentials
        $request->authenticate();

        // Regenerate the session to prevent session fixation attacks
        $request->session()->regenerate();

        // Check the role of the authenticated user and redirect accordingly
        if (Auth::user()->role === 'admin') {
            // Redirect to admin dashboard if the user has the 'admin' role
            return redirect()->intended('/admin-dashboard');  // Use correct route
        } else {
            // Redirect to user dashboard for regular users
            return redirect()->intended('/user/dashboard');   // Use correct route
        }
    }

    /**
     * Destroy an authenticated session (logout).
     */
    public function destroy(Request $request): RedirectResponse
{
    Auth::guard('web')->logout();

    // Invalidate the session
    $request->session()->invalidate();

    // Regenerate the session token for security
    $request->session()->regenerateToken();

    // Redirect to the home page after logout
    return redirect('/');
    }
}
