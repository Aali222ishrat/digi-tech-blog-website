<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class AuthorCategoryController extends Controller
{
    public function index()
    {
        // Fetch all categories from admin
        $categories = Category::orderBy('cat_id','desc')->paginate(10);
        return view('author-dashboard.categories.index', compact('categories'));
    }
}
