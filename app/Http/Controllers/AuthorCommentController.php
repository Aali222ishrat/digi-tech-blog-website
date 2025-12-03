<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorCommentController extends Controller
{
    public function index()
    {
        // Sirf us author k blogs k comments show hon
        $comments = Comment::whereHas('blog', function($q) {
            $q->where('author_id', auth()->id());
        })->latest()->get();

        return view('author-dashboard.comments.index', compact('comments'));
    }

    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->is_approved = true;
        $comment->save();

        return back()->with('success', 'Comment Approved Successfully!');
    }
}
