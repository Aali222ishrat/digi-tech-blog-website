@extends('admin-dashboard.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">✏️ Edit Category</h2>

    <form action="{{ route('admin-dashboard.categories.update', $category->cat_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Slug (optional)</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug) }}">
            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="{{ route('admin-dashboard.categories.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
