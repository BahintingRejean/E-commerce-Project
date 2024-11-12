<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        // If the user has already verified their email, redirect to the appropriate dashboard
        if ($request->user()->hasVerifiedEmail()) {
            return $this->redirectToDashboard($request->user());
        }

        // Send a new email verification notification
        $request->user()->sendEmailVerificationNotification();

        // Redirect back with a status indicating the verification link has been sent
        return back()->with('status', 'verification-link-sent');
    }

    /**
     * Redirect user based on their role after email verification.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectToDashboard($user): RedirectResponse
    {
        if ($user->role === 'admin') {
            return redirect()->intended('/admin-dashboard');
        }

        return redirect()->intended('/user-dashboard');
    }
}
