@extends('author-dashboard.author')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="mb-4 text-center">Add New Tag</h3>

        <!-- Show validation errors -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('author-dashboard.tags.store') }}" method="POST">
            @csrf

            <!-- Tag Name -->
            <div class="mb-3">
                <label class="form-label">Tag Name <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter tag name" required>
            </div>

            <!-- Slug -->
            <div class="mb-3">
                <label class="form-label">Slug <span class="text-danger">*</span></label>
                <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" placeholder="Enter slug" required>
                <small class="text-muted">Example: "web-development" or "php"</small>
            </div>

            <button type="submit" class="btn btn-success">Save Tag</button>
            <a href="{{ route('author-dashboard.tags.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
