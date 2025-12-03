@extends('admin-dashboard.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Slider</h2>

    <form action="{{ route('admin-dashboard.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $slider->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Button Text</label>
            <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $slider->button_text) }}">
        </div>

        <div class="mb-3">
            <label>Button URL</label>
            <input type="url" name="button_url" class="form-control" value="{{ old('button_url', $slider->button_url) }}">
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            <img src="{{ asset('uploads/slider/'.$slider->image) }}" alt="{{ $slider->title }}" width="200">
        </div>

        <div class="mb-3">
            <label>Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $slider->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$slider->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button class="btn btn-success">Update Slider</button>
        <a href="{{ route('admin-dashboard.slider.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
