@extends('admin-dashboard.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">➕ Add Tech Category</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin-dashboard.categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. Artificial Intelligence">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Slug (optional)</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="e.g. ai">
            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Category</button>
        <a href="{{ route('admin-dashboard.categories.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection
