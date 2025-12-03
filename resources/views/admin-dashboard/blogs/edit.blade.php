@extends('admin-dashboard.layout')

@section('title', 'Edit Blog')

@section('content')
<div class="card shadow-sm mt-4">
    <div class="card-body">
        <h3 class="card-title mb-4 text-center">Edit Blog</h3>

        <form action="{{ route('admin-dashboard.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Blog Title -->
            <div class="mb-3">
                <label class="form-label">Blog Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
            </div>

            <!-- Category -->
            <div class="mb-3">
                <label class="form-label">Select Category <span class="text-danger">*</span></label>
                <select name="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->cat_id }}" 
                            {{ $blog->category_id == $category->cat_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tags -->
            <div class="mb-3">
                <label class="form-label">Tags</label>
                <select name="tags[]" class="form-control" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"
                            {{ in_array($tag->id, $blog->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Short Description -->
            <div class="mb-3">
                <label class="form-label">Short Description <span class="text-danger">*</span></label>
                <textarea name="short_description" class="form-control" rows="3" required>{{ $blog->short_description }}</textarea>
            </div>

            <!-- Full Blog Description -->
            <div class="mb-3">
                <label class="form-label">Full Description <span class="text-danger">*</span></label>
                <textarea name="description" class="form-control" rows="6" required>{{ $blog->description }}</textarea>
            </div>

            <!-- Author -->
            <div class="mb-3">
                <label class="form-label">Select Author</label>
                <select name="author_id" class="form-control">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" 
                            {{ $blog->author_id == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Blog Image -->
            <div class="mb-3">
                <label class="form-label d-block">Blog Image</label>
                
                @if($blog->image)
                    <img src="{{ asset('storage/blogs/' . $blog->image) }}" 
                         width="120" class="rounded mb-2" alt="Blog Image">
                @endif

                <input type="file" name="image" class="form-control">
            </div>

            <button class="btn btn-primary">Update Blog</button>

        </form>
    </div>
</div>
@endsection
