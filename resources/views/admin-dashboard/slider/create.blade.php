@extends('admin-dashboard.admin')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">

        <h3>Add Slider</h3>
        <form method="POST" action="{{ route('admin-dashboard.slider.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Title *</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Button Text</label>
                <input type="text" name="button_text" class="form-control">
            </div>

            <div class="mb-3">
                <label>Button URL</label>
                <input type="text" name="button_url" class="form-control">
            </div>

            <div class="mb-3">
                <label>Slider Image *</label>
                <input type="file" name="image" class="form-control" required>
            </div>

            <button class="btn btn-primary">Save Slider</button>
        </form>

    </div>
</div>
@endsection
