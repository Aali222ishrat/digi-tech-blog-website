<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(Request $request)
{
    $search = $request->get('search');

    $blogs = Blog::with('category')
        ->where('author_id', auth()->id())   // ✔ Only logged-in author ke blogs
        ->when($search, function($query, $search) {
            $query->where('title', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(5);

    return view('author-dashboard.blogs.index', compact('blogs', 'search'));
}

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('author-dashboard.blogs.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'            => 'required',
            'slug'             => 'required',
            'short_description'=> 'required',
            'content'          => 'required',
            'category_id'      => 'required',
            'featured_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blogs', 'public');
        }

        $blog = Blog::create([
            'title'            => $request->title,
            'slug'             => $request->slug,
            'short_description'=> $request->short_description,
            'content'          => $request->content,

            // ✔ Correct DB column
            'category_id' => $request->category_id,

            'featured_image'   => $imagePath,
            'publish_date'     => $request->status == 'Published' ? now() : null,
            'status'           => $request->status,
            'allow_comments'   => $request->has('allow_comments'),
            'author_id'        => auth()->id(),
        ]);

        if ($request->tags) {
            $blog->tags()->sync($request->tags);
        }

        return redirect()->route('author-dashboard.blogs.index')
                         ->with('success', 'Blog added successfully!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        if ($blog->author_id != auth()->id()) {
    abort(403, 'Unauthorized action.');
}

        return view('author-dashboard.blogs.edit', compact('blog','categories','tags'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title'            => 'required',
            'slug'             => 'required',
            'short_description'=> 'required',
            'content'          => 'required',
            'category_id'      => 'required',
            'featured_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $imagePath = $blog->featured_image;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blogs', 'public');
        }

        $blog->update([
            'title'            => $request->title,
            'slug'             => $request->slug,
            'short_description'=> $request->short_description,
            'content'          => $request->content,

            // ✔ Correct DB column
           'category_id'      => $request->category_id,   // ✔ FIXED

            'featured_image'   => $imagePath,
            'publish_date'     => $request->publish_date,
            'status'           => $request->status,
            'allow_comments'   => $request->has('allow_comments'),
        ]);

        if ($request->tags) {
            $blog->tags()->sync($request->tags);
        }

        if ($blog->author_id != auth()->id()) {
    abort(403, 'Unauthorized action.');
}

        return redirect()->route('author-dashboard.blogs.index')
                         ->with('success', 'Blog updated successfully!');
    }

    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
        return redirect()->route('author-dashboard.blogs.index')
                         ->with('success', 'Blog deleted successfully!');
    }
}
