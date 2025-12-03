@extends('frontend-layout.app')

@section('title','Blogs - DigiSkills Clone')

@section('content')
<div class="container py-5">

  <!-- Top Heading + Search -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="section-title">All Blogs</h2>

    <form class="d-flex" role="search" method="GET">
      <input class="form-control me-2" name="search" value="{{ $search ?? '' }}" type="search" placeholder="Search blogs">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
    </form>
  </div>


  <!-- Blog Cards -->
  <div class="row g-4">
    @forelse ($blogs as $blog)
      <div class="col-md-4">
        <div class="card card-border course-card">

          <!-- Featured Image -->
          <img src="{{ asset('storage/' . $blog->featured_image) }}" class="card-img-top"
            alt="{{ $blog->title }}">

          <div class="card-body">

            <!-- Blog Title -->
            <h5 class="card-title">{{ $blog->title }}</h5>

            <!-- Author + Publish Date -->
                        <p class="small text-muted mb-2">
                            By <strong>{{ $blog->author->name ?? 'Unknown Author' }}</strong> •
                            {{ $blog->publish_date ? \Carbon\Carbon::parse($blog->publish_date)->format('M d, Y') : 'Not Published' }}
                        </p>

                        <!-- Category -->
                        <p class="badge bg-primary">
                            {{ $blog->category->name ?? 'No Category' }}
                        </p>

            <!-- Short Description -->
            <p class="text-muted">{{ Str::limit($blog->short_description, 100) }}</p>

            <!-- Read More -->
            <a href="{{ url('blog/' . $blog->slug) }}" class="btn btn-primary btn-sm">
              Read More
            </a>
          </div>

          <div class="card-footer small text-muted">
            Published: 
            {{ $blog->publish_date ? \Carbon\Carbon::parse($blog->publish_date)->format('d M Y') : 'Not Published' }}
          </div>
        </div>
      </div>
    @empty
      <p class="text-center">No blogs found.</p>
    @endforelse
  </div>


  <!-- Pagination -->
  <div class="mt-4">
    {{ $blogs->links() }}
  </div>

</div>
@endsection
