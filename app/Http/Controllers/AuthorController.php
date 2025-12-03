<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function Authordashboard()
 {
        $user = auth()->user();

        // Author ki approval check karo
        if (!$user->is_approved) {
            return redirect('/login')->withErrors([
                'email' => 'Your account is not approved yet. Please wait for admin approval.'
            ]);
        }

        // Agar approved hai, dashboard view bhejo
        return view('author-dashboard.author', [
            'user' => $user,
            'approved_message' => 'Congratulations! Admin has approved your account.',
        ]);
    }
}
