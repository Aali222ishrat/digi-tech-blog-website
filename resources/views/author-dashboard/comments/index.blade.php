@extends('author-dashboard.layout')

@section('content')

<h3>New Comments on Your Blogs</h3>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Blog</th>
            <th>Visitor Name</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Approve</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($comments as $c)
        <tr>
            <td>{{ $c->blog->title }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ $c->comment }}</td>
            <td>
                @if($c->is_approved)
                    <span class="badge bg-success">Approved</span>
                @else
                    <span class="badge bg-warning">Pending</span>
                @endif
            </td>
            <td>
                @if(!$c->is_approved)
                <form action="{{ route('author-dashboard.comments.approve', $c->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-primary">Approve</button>
                </form>
                @else
                ---
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
