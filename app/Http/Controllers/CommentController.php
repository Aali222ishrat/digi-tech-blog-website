<?php

namespace App\Http\Controllers;

use App\Models\Comment;    // Correct Model Name
use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // -----------------------------------------------
    // SHOW COMMENTS IN AUTHOR DASHBOARD
    // -----------------------------------------------
    public function index()
    {
        // Only comments of blogs that belong to logged-in author
        $comments = Comment::whereHas('blog', function($q) {
            $q->where('author_id', auth()->id());
        })
        ->with('blog')
        ->latest()
        ->get();

        return view('author-dashboard.comments.index', compact('comments'));
    }

    // -----------------------------------------------
    // APPROVE COMMENT
    // -----------------------------------------------
    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->is_approved = 1;
        $comment->save();

        return back()->with('success', 'Comment Approved Successfully!');
    }

    // -----------------------------------------------
    // DELETE COMMENT
    // -----------------------------------------------
    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();

        return back()->with('success', 'Comment Deleted Successfully!');
    }

    // -----------------------------------------------
    // STORE COMMENT (VISITOR PUBLIC COMMENT FORM)
    // -----------------------------------------------
    public function store(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'comment' => 'required|string',
        ]);

        Comment::create([
            'blog_id' => $request->blog_id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'is_approved' => false, // By default pending
        ]);

        return back()->with('success', 'Your comment has been submitted and is awaiting approval.');
    }
}
