<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
  public function Admindashboard()
{
    $pendingCount = User::where('role', 'author')
                        ->where('is_approved', false)
                        ->count();

    $approvedCount = User::where('role', 'author')
                         ->where('is_approved', true)
                         ->count();

    $totalAuthors = User::where('role', 'author')->count();

    // List of ALL authors (pending + approved)
    $users = User::where('role', 'author')->get();

    // List of only pending authors
    $pendingUsers = User::where('role', 'author')
                        ->where('is_approved', false)
                        ->get();

    return view('admin-dashboard.admin', compact(
        'pendingCount',
        'approvedCount',
        'totalAuthors',
        'pendingUsers',
        'users'
    ));
}


    // 🟨 Show all pending users
    public function users()
    {
        $users = User::where('role', 'author')
                     ->where('is_approved', false)
                     ->get();

        return view('admin-dashboard.users', compact('users'));
    }

    // 🟦 Approve user
    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->is_approved = true;
        $user->save();

        return redirect()->back()->with('success', 'User approved successfully!');
    }

    public function reject($id)
{
    $user = User::findOrFail($id);

    // Delete the user (reject)
    $user->delete();

    return redirect()->back()->with('success', 'User rejected and removed successfully!');
}

}
