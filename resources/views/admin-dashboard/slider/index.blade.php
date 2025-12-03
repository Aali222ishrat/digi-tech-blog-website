@extends('admin-dashboard.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Manage Sliders</h2>

    <a href="{{ route('admin-dashboard.slider.create') }}" class="btn btn-primary mb-3">Add New Slider</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sliders as $slider)
            <tr>
                <td>{{ $slider->id }}</td>
                <td>{{ $slider->title }}</td>
                <td>
                    <img src="{{ asset('uploads/slider/'.$slider->image) }}" alt="{{ $slider->title }}" width="100">
                </td>
                <td>
                    @if($slider->status)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin-dashboard.slider.edit', $slider->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin-dashboard.slider.delete', $slider->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No sliders found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
