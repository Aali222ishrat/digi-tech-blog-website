<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
    // Authenticate user
    $request->authenticate();

    // Regenerate session
    $request->session()->regenerate();

    $user = Auth::user();

    // ⭐ If user is NOT admin + not approved → block them
    if ($user->role !== 'admin' && $user->is_approved == 0) {
        Auth::logout();

        return back()->withErrors([
            'email' => 'Your account is not approved yet. Please wait for admin approval.',
        ]);
    }

    // ⭐ Admin redirect
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard')
            ->with('success', 'Welcome Admin!');
    }

    // ⭐ Author redirect
    return redirect()->route('author.dashboard')
        ->with('approved', '🎉 Your account has been approved by admin! You can now access your dashboard.');
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
