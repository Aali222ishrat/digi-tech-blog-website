@extends('admin-dashboard.admin')

@section('content')
<div class="container">
    <h2 class="mb-3">📋 Tech Categories</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <form method="GET" action="{{ route('admin-dashboard.categories.index') }}" class="d-flex">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control me-2" placeholder="Search category...">
            <button class="btn btn-outline-primary">Search</button>
        </form>

        <a href="{{ route('admin-dashboard.categories.create') }}" class="btn btn-success">➕ New Category</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $cat)
                    <tr>
                        <td>{{ $cat->cat_id }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->slug }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($cat->description, 60) }}</td>
                        <td>{{ $cat->created_at->format('d M, Y') }}</td>
                        <td>
                            <a href="{{ route('admin-dashboard.categories.edit', $cat->cat_id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin-dashboard.categories.destroy', $cat->cat_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">No categories found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $categories->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
