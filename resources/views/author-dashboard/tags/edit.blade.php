@extends('author-dashboard.author')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="mb-4">Edit Tag</h3>

        <!-- Back Button -->
        <a href="{{ route('author-dashboard.tags.index') }}" class="btn btn-secondary mb-3">
            Back to Tags
        </a>

        <!-- Edit Form -->
        <form action="{{ route('author-dashboard.tags.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Tag Name -->
            <div class="mb-3">
                <label class="form-label">Tag Name <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ $tag->name }}" class="form-control" required>
            </div>

            <!-- Slug -->
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" value="{{ $tag->slug }}" class="form-control">
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary">Update Tag</button>
        </form>
    </div>
</div>
@endsection
