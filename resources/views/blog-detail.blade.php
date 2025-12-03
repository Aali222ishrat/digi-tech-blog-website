@extends('frontend-layout.app')

@section('title', $blog->title)

@section('content')

<div class="container my-5">
    <div class="row">

        <!-- LEFT SIDE - BLOG CONTENT -->
        <div class="col-lg-9">

            <!-- Featured Image -->
            <img src="{{ asset('storage/' . $blog->featured_image) }}" class="card-img-top" alt="{{ $blog->title }}">

            <!-- Blog Title -->
            <h1 class="fw-bold">{{ $blog->title }}</h1>

            <!-- Publish Info -->
            <div class="text-muted mb-3">
                <small>
                    <strong>Category:</strong> {{ $blog->category->name ?? 'N/A' }} |
                    <strong>Published:</strong> {{ $blog->publish_date ?? 'Not Set' }}
                </small>
            </div>

            <!-- Short Description -->
            @if($blog->short_description)
            <p class="lead">{{ $blog->short_description }}</p>
            @endif

            <!-- Full Content -->
            <div class="mt-4">
                {!! nl2br(e($blog->content)) !!}
            </div>

            <!-- Tags -->
            @if($blog->tags && $blog->tags->count())
            <div class="mt-4">
                <h5>Tags:</h5>
                @foreach($blog->tags as $tag)
                <span class="badge bg-primary me-1">{{ $tag->name }}</span>
                @endforeach
            </div>
            @endif

        </div>

        <!-- RIGHT SIDE - SIDEBAR -->
        <div class="col-lg-3">

            <!-- Recent Blogs -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">
                    Recent Blogs
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($recentBlogs as $rBlog)
                    <li class="list-group-item">
                        <a href="{{ url('/blogs/'.$rBlog->id) }}" class="text-decoration-none">
                            {{ $rBlog->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Categories -->
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white fw-bold">
                    Categories
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($categories as $cat)
                    <li class="list-group-item">
                        {{ $cat->name }}
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>

        {{-- AUTHOR INFO SECTION --}}
        <div class="card mt-5 p-3 shadow-sm">

            author info add

        </div>

        <h3>Leave a Comment</h3>

<form action="{{ route('comment.store') }}" method="POST">
    @csrf
    <input type="hidden" name="blog_id" value="{{ $blog->id }}">

    <div class="mb-3">
        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
    </div>

    <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
    </div>

    <div class="mb-3">
        <textarea name="comment" class="form-control" rows="3" placeholder="Write comment..." required></textarea>
    </div>

    <button class="btn btn-primary">Submit Comment</button>
</form>

@foreach($blog->comments->where('is_approved', true) as $c)
    <div class="comment-box">
        <strong>{{ $c->name }}</strong>
        <p>{{ $c->comment }}</p>
    </div>
@endforeach

    </div>
</div>



@endsection