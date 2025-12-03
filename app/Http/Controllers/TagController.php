<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag; // ✅ Import the Tag model
use Illuminate\Support\Str; 

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('author-dashboard.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('author-dashboard.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags,name'
        ]);

        Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('author-dashboard.tags.index')->with('success', 'Tag created');
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('author-dashboard.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:tags,name,' . $tag->id
        ]);

        $tag->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('author-dashboard.tags.index')->with('success', 'Tag updated');
    }

    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return back()->with('success', 'Tag deleted');
    }
}
