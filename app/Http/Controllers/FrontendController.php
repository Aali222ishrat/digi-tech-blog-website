<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Blog;   // <-- Add this
use App\Models\Category;

class FrontendController extends Controller
{
    public function home() {

        // Get active sliders
        $sliders = Slider::where('status', 1)
                         ->orderBy('id', 'DESC')
                         ->get();

        // Get latest published blogs
        $blogs = Blog::where('status', 'Published')
                     ->orderBy('id', 'DESC')
                     ->take(6)   // show 6 blogs on homepage
                     ->get();

                     $categories = Category::latest()->get();




        return view('home', compact('sliders', 'blogs','categories'));
    }

    public function blogs(Request $request)
{
    $search = $request->get('search');

    $blogs = \App\Models\Blog::where('status', 'Published')
        ->when($search, function($query, $search) {
            $query->where('title', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(6);

    return view('blogs', compact('blogs', 'search'));
}


    public function blogDetail($id)
{
    $blog = Blog::with('category')->findOrFail($id);

    $categories = Category::all();
    $recentBlogs = Blog::latest()->take(5)->get();

    return view('blog-detail', compact('blog', 'categories', 'recentBlogs'));
}

    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }
}
