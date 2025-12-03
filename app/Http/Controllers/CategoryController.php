<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', \App\Http\Middleware\IsAdmin::class]); // assumes is_admin middleware exists
    }

    public function index(Request $request)
    {
        $query = Category::query();

        if ($search = $request->get('search')) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        $categories = $query->orderByDesc('created_at')->paginate(10);

         return view('admin-dashboard.categories.index', compact('categories'));
    }

    public function create()
{
    $pendingUsers = \App\Models\User::where('is_approved', 0)->count();

    return view('admin-dashboard.categories.create', compact('pendingUsers'));
}

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        Category::create($data);

        return redirect()->route('admin-dashboard.categories.index')->with('success','Category created.');
    }

    public function edit(Category $category)
    {
        return view('admin-dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->cat_id.',cat_id',
            'slug' => 'nullable|string|max:255|unique:categories,slug,'.$category->cat_id.',cat_id',
            'description' => 'nullable|string',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $category->update($data);

        return redirect()->route('admin-dashboard.categories.index')->with('success','Category updated.');
    }

    public function destroy(Category $category)
    {
        // optional: check for related posts before delete
        if ($category->posts()->count() > 0) {
            return back()->with('error','Cannot delete category with posts. Reassign or delete posts first.');
        }

        $category->delete();

        return back()->with('success','Category deleted.');
    }
}
