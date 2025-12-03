
@extends('author-dashboard.layout')

@section('title', 'Author Dashboard')

@section('content')

    {{-- Custom Dashboard Cards --}}
    <div class="row">
                <div class="col-md-4">
                    <div class="card text-bg-info mb-3">
                        <div class="card-body">
                            <h5 class="card-title">My Blogs</h5>
                            <p class="card-text">8</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Published</h5>
                            <p class="card-text">6</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pending</h5>
                            <p class="card-text">2</p>
                        </div>
                    </div>
                </div>
            </div>

    
@endsection


