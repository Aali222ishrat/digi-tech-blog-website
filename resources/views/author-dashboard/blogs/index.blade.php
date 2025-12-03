@extends('author-dashboard.author')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Manage Blogs</h2>

    <!-- Search and Add Button -->
    <form method="GET" action="{{ route('author-dashboard.blogs.index') }}" class="mb-3 d-flex justify-content-between flex-wrap">
        <div class="d-flex flex-wrap">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search by title..." class="form-control me-2 mb-2 mb-md-0" style="width: 250px;">
            <button class="btn btn-secondary mb-2 mb-md-0">Search</button>
        </div>
        <a href="{{ route('author-dashboard.blogs.create') }}" class="btn btn-success">+ Add Blog</a>
    </form>

    <!-- Blog Table -->
    <div class="card shadow-sm">
        <div class="card-body p-2">

            <!-- RESPONSIVE WRAPPER -->
            <div class="table-responsive">

                <table class="table table-bordered table-striped align-middle table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Short Description</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Featured Image</th>
                            <th>Publish Date</th>
                            <th>Status</th>
                            <th>Allow Comments</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->slug }}</td>
                                <td class="text-truncate" style="max-width:150px;">{{ Str::limit($blog->short_description, 50) }}</td>
                                <td>{{ $blog->cat_id }}</td>
                                <td>{{ $blog->tags }}</td>
                                <td>
                                    @if($blog->featured_image)
                                        <img src="{{ asset('storage/' . $blog->featured_image) }}" width="60" height="60" class="rounded" style="object-fit: cover;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $blog->publish_date ? \Carbon\Carbon::parse($blog->publish_date)->format('d M, Y') : '-' }}</td>
                                <td>
                                    <span class="badge bg-{{ $blog->status == 'Published' ? 'success' : 'secondary' }}">
                                        {{ $blog->status }}
                                    </span>
                                </td>
                                <td>{{ $blog->allow_comments ? 'Yes' : 'No' }}</td>
                                <td>{{ $blog->created_at->format('d M, Y') }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('author-dashboard.blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                                    <form action="{{ route('author-dashboard.blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this blog?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center text-muted">No blogs found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div> <!-- END table-responsive -->

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $blogs->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
