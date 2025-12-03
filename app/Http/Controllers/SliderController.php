<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider; // <-- import the Slider model

class SliderController extends Controller
{
    // Show all sliders (admin index)
    public function index()
    {
        $sliders = Slider::all();
        return view('admin-dashboard.slider.index', compact('sliders'));
    }

    // Show form to create a new slider
    public function create()
    {
        return view('admin-dashboard.slider.create');
    }

    // Store new slider
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:50',
            'button_url' => 'nullable|url',
            'status' => 'nullable|boolean',
        ]);

        $imgName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/slider'), $imgName);

        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'button_text' => $request->button_text,
            'button_url' => $request->button_url,
            'image' => $imgName,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin-dashboard.slider.index')->with('success', 'Slider created successfully');
    }

    // Show form to edit a slider
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin-dashboard.slider.edit', compact('slider'));
    }

    // Update a slider
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->button_text = $request->button_text;
        $slider->button_url = $request->button_url;
        $slider->status = $request->status ?? 1;

        if($request->hasFile('image')){
            $imgName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/slider'), $imgName);
            $slider->image = $imgName;
        }

        $slider->save();

        return redirect()->route('admin-dashboard.slider.index')->with('success', 'Slider updated successfully');
    }

    // Delete a slider
    public function destroy($id)
    {
        Slider::findOrFail($id)->delete();
        return back()->with('success', 'Slider deleted successfully');
    }
}
