@extends('admin-dashboard.layout')

@section('title', 'Manage Blogs')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Manage Blogs</h2>

    <div class="card shadow-sm rounded-4">
        <div class="card-body p-2">

            <!-- Responsive Wrapper -->
            <div class="table-responsive">

                <table class="table table-bordered table-striped align-middle table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Short Description</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Publish Date</th>
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

                            <td class="text-truncate" style="max-width:150px;">
                                {{ Str::limit($blog->short_description, 50) }}
                            </td>

                            <td>{{ $blog->author?->name ?? 'Unknown' }}</td>

                            <td>{{ $blog->category->name ?? 'No Category' }}</td>

                            <td>
                                @if($blog->featured_image)
                                    <img src="{{ asset('storage/' . $blog->featured_image) }}" width="60" height="60" class="rounded" style="object-fit: cover;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            <td>
                                <span class="badge bg-{{ $blog->status == 'Published' ? 'success' : 'secondary' }}">
                                    {{ $blog->status }}
                                </span>
                            </td>

                            <td>
                                {{ $blog->publish_date
                                    ? \Carbon\Carbon::parse($blog->publish_date)->format('d M Y')
                                    : 'Not Published'
                                }}
                            </td>

                            <td>{{ $blog->created_at->format('d M Y') }}</td>

                            <td class="text-nowrap">
                                <a href="{{ route('admin-dashboard.blogs.edit', $blog->id) }}"
                                   class="btn btn-primary btn-sm mb-1">
                                    Edit
                                </a>

                                <form action="{{ route('admin-dashboard.blogs.destroy', $blog->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this blog?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center text-muted">No blogs found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div><!-- END table-responsive -->

        </div>
    </div>

</div>
@endsection
