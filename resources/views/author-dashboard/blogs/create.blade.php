@extends('author-dashboard.author')

@section('content')
 

  <div class="card shadow-sm">
    <div class="card-body">
      <h3 class="card-title mb-4 text-center">Create New Blog</h3>

      <form action="{{ route('author-dashboard.blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Blog Title -->
    <div class="mb-3">
        <label class="form-label">Blog Title <span class="text-danger">*</span></label>
        <input type="text" name="title" class="form-control" placeholder="Enter blog title" required>
    </div>

    <!-- Slug -->
    <div class="mb-3">
        <label class="form-label">Slug</label>
        <input type="text" name="slug" class="form-control" placeholder="auto-generated or custom slug">
    </div>

    <!-- Short Description -->
    <div class="mb-3">
        <label class="form-label">Short Description</label>
        <textarea name="short_description" class="form-control" rows="2" placeholder="Write a short description"></textarea>
    </div>

    <!-- Blog Content -->
    <div class="mb-3">
        <label class="form-label">Content <span class="text-danger">*</span></label>
        <textarea name="content" class="form-control" rows="6" placeholder="Write your blog content..." required></textarea>
    </div>

    <!-- Category -->
    <div class="mb-3">
        <label class="form-label">Category <span class="text-danger">*</span></label>
        <select name="category_id" class="form-select" required>
    <option value="">Select category</option>

    @foreach($categories as $category)
        <option value="{{ $category->cat_id }}">{{ $category->name }}</option>
    @endforeach

</select>
    </div>

    <!-- Tags -->
    <div class="mb-3">
    <label class="form-label">Select Tags</label>
    <select name="tags[]" class="form-control" multiple>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
</div>

    <!-- Featured Image -->
    <div class="mb-3">
        <label class="form-label">Featured Image</label>
        <input type="file" name="featured_image" class="form-control">
    </div>

    <!-- Publish Date -->
    <div class="mb-3">
        <label class="form-label">Publish Date</label>
        <input type="date" name="publish_date" class="form-control">
    </div>

    <!-- Status -->
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option>Draft</option>
            <option>Published</option>
        </select>
    </div>

    <!-- Allow Comments -->
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="allow_comments" id="comments" checked>
        <label class="form-check-label" for="comments">Allow Comments</label>
    </div>

    <!-- Submit -->
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Create Blog</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
</form>

    </div>
  </div>

  @endsection
