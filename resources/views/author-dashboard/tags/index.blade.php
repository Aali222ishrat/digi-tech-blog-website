@extends('author-dashboard.author')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="mb-4">Manage Tags</h3>

        <a href="{{ route('author-dashboard.tags.create') }}" class="btn btn-primary mb-3">Add New Tag</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tag Name</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->slug }}</td>
                    <td>
                        <a href="{{ route('author-dashboard.tags.edit', $tag->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('author-dashboard.tags.destroy', $tag->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this tag?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No tags found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
