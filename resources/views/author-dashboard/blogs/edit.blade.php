@extends('author-dashboard.author')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="card-title mb-4 text-center">Edit Blog</h3>

        <form action="{{ route('author-dashboard.blogs.update', $blog->id) }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Blog Title -->
            <div class="mb-3">
                <label class="form-label">Blog Title <span class="text-danger">*</span></label>
                <input type="text" name="title" value="{{ $blog->title }}" 
                       class="form-control" required>
            </div>

            <!-- Slug -->
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" value="{{ $blog->slug }}" class="form-control">
            </div>

            <!-- Short Description -->
            <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea name="short_description" class="form-control" rows="2">
                    {{ $blog->short_description }}
                </textarea>
            </div>

            <!-- Content -->
            <div class="mb-3">
                <label class="form-label">Content <span class="text-danger">*</span></label>
                <textarea name="content" class="form-control" rows="6" required>
                    {{ $blog->content }}
                </textarea>
            </div>

            <!-- Category -->
            <div class="mb-3">
                <label class="form-label">Category <span class="text-danger">*</span></label>
                <select name="category" class="form-select" required>
                    <option value="">Select category</option>
                    <option {{ $blog->category == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                    <option {{ $blog->category == 'Design' ? 'selected' : '' }}>Design</option>
                    <option {{ $blog->category == 'Technology' ? 'selected' : '' }}>Technology</option>
                    <option {{ $blog->category == 'Education' ? 'selected' : '' }}>Education</option>
                    <option {{ $blog->category == 'Lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                </select>
            </div>

            <!-- Tags -->
            <div class="mb-3">
                <label class="form-label">Tags</label>
                <input type="text" name="tags" value="{{ $blog->tags }}" 
                       class="form-control">
            </div>

            <!-- Featured Image -->
            <div class="mb-3">
                <label class="form-label">Featured Image</label>
                <input type="file" name="featured_image" class="form-control">

                @if($blog->featured_image)
                    <div class="mt-3">
                        <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                             alt="Image" width="120" 
                             style="border-radius: 8px; object-fit: cover;">
                    </div>
                @endif
            </div>

            <!-- Publish Date -->
            <div class="mb-3">
                <label class="form-label">Publish Date</label>
                <input type="date" name="publish_date" value="{{ $blog->publish_date }}" 
                       class="form-control">
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option {{ $blog->status == 'Draft' ? 'selected' : '' }}>Draft</option>
                    <option {{ $blog->status == 'Published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            <!-- Allow Comments -->
            <div class="form-check mb-3">
                <input type="checkbox" name="allow_comments" 
                       class="form-check-input" id="comments"
                       {{ $blog->allow_comments ? 'checked' : '' }}>
                <label class="form-check-label" for="comments">Allow Comments</label>
            </div>

            <!-- Update Button -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Update Blog</button>
                <a href="{{ route('author-dashboard.blogs.index') }}" 
                   class="btn btn-secondary">Back</a>
            </div>

        </form>
    </div>
</div>

@endsection
