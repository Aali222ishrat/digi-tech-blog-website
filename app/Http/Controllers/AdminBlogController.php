<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get(); 
        return view('admin-dashboard.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        // Authors list
        $authors = User::where('role', 'author')->get();

        // Dashboard counts
        $totalAuthors = User::where('role', 'author')->count();
        $totalBlogs = Blog::count();
        $approvedCount = User::where('is_approved', 1)->count();
        $pendingCount = User::where('is_approved', 0)->count();
        $users = User::where('role', 'author')->get();

        return view('admin-dashboard.blogs.create', compact(
            'categories',
            'tags',
            'authors',
            'totalAuthors',
            'totalBlogs',
            'approvedCount',
            'pendingCount',
            'users'
        ));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'cat_id' => 'required',  // your database column
    ]);

    // Prepare data
    $data = [
        'title' => $request->title,
        'slug'  => \Str::slug($request->title),
        'content' => $request->content,
        'category_id' => $request->cat_id,  // FIXED
        'author_id' => auth()->id(),
        'status' => $request->status ?? 'Published',

        // ⭐ FIX: Publish date logic
    'publish_date' => $request->status == 'Published' ? now() : null,
    ];

    // Handle image
    if ($request->hasFile('featured_image')) {
        $data['featured_image'] = $request->file('featured_image')->store('blogs', 'public');
    }

    // Save blog
    Blog::create($data);

    return redirect()
        ->route('admin-dashboard.blogs.index')
        ->with('success', 'Blog created successfully.');
}


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        $categories = Category::all();
        $tags = Tag::all();
        $authors = User::where('role', 'author')->get();

        return view('admin-dashboard.blogs.edit', compact('blog', 'categories', 'tags', 'authors'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author_id' => 'required|exists:users,id'
        ]);

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => $request->author_id,
            'cat_id' => $request->cat_id ?? $blog->cat_id,
        ]);

        return redirect()->route('admin-dashboard.blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    public function approve(Blog $blog)
    {
        $blog->status = 'approved';
        $blog->save();

        return redirect()->back()->with('success', 'Blog approved successfully.');
    }

    public function reject(Blog $blog)
    {
        $blog->status = 'rejected';
        $blog->save();

        return redirect()->back()->with('success', 'Blog rejected successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully.');
    }
}
