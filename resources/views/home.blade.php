@extends('frontend-layout.app')

@section('title','Home - DigiSkills Clone')

@section('content')



<!-- ======= Tech Categories Section ======= -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Explore Tech Categories</h2>
      <p class="text-muted">Find articles by your favorite technology category</p>
    </div>

    <!-- Swiper Slider -->
    <div class="swiper myCategorySlider">
      <div class="swiper-wrapper">
        @foreach($categories as $cat)
          <div class="swiper-slide">
            <div class="category-card shadow-sm p-4 rounded-4 text-center">
              <div class="icon-box mx-auto mb-3">
                <i class="bi bi-grid-fill"></i>
              </div>
              <h5 class="fw-bold">{{ $cat->name }}</h5>
              <p class="text-muted small">{{ \Illuminate\Support\Str::limit($cat->description, 60) }}</p>
              <a href="{{ url('category/'.$cat->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill mt-2">
                View Blogs →
              </a>
            </div>
          </div>
        @endforeach

        {{-- If categories are less than 4, duplicate slides to allow loop --}}
        @if($categories->count() < 4)
          @foreach($categories as $cat)
            <div class="swiper-slide">
              <div class="category-card shadow-sm p-4 rounded-4 text-center">
                <div class="icon-box mx-auto mb-3">
                  <i class="bi bi-grid-fill"></i>
                </div>
                <h5 class="fw-bold">{{ $cat->name }}</h5>
                <p class="text-muted small">{{ \Illuminate\Support\Str::limit($cat->description, 60) }}</p>
                <a href="{{ url('category/'.$cat->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill mt-2">
                  View Blogs →
                </a>
              </div>
            </div>
          @endforeach
        @endif

      </div>

      <!-- Controls -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination mt-3"></div>
    </div>
  </div>
</section>





<!-- ======= Popular Blogs ======= -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="section-title ">Popular Blogs</h3>
            <a href="/blogs" class="text-decoration-none">View all blogs →</a>
        </div>
        <div class="row g-3">
            @foreach ($blogs as $blog)
            <div class="col-md-4">
                <div class="card card-border course-card">

                    <!-- Featured Image -->
                    <img src="{{ asset('storage/' . $blog->featured_image) }}" class="card-img-top"
                        alt="{{ $blog->title }}">

                    <div class="card-body">

                        <!-- Blog Title -->
                        <h5 class="card-title">{{ $blog->title }}</h5>

                        <!-- Short Description -->
                        <p class="card-text text-muted">
                            {{ Str::limit($blog->short_description, 100) }}
                        </p>

                        <!-- Author + Publish Date -->
                        <p class="small text-muted mb-2">
                            By <strong>{{ $blog->author->name ?? 'Unknown Author' }}</strong> •
                            {{ $blog->publish_date ? \Carbon\Carbon::parse($blog->publish_date)->format('M d, Y') : 'Not Published' }}
                        </p>

                        <!-- Category -->
                        <p class="badge bg-primary">
                            {{ $blog->category->name ?? 'No Category' }}
                        </p>

                        <!-- View Blog Button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ url('/blogs/' . $blog->id) }}" class="btn btn-sm btn-primary-custom text-white">
                                View Blog
                            </a>

                            <small class="text-muted">
                                {{ $blog->created_at->diffForHumans() }}
                            </small>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </div>
    </div>
</section>

<!-- NEWSLETTER -->
<section class="py-5">
    <div class="container">
        <div class="newsletter-box text-center">
            <h2 class="fw-bold">Subscribe to Our Newsletter</h2>
            <p class="mb-3">Join 10,000+ readers & get weekly tech updates!</p>
            <div class="d-flex justify-content-center">
                <input type="email" class="form-control w-25 me-2 rounded-pill" placeholder="Enter Email" />
                <button class="btn btn-light px-4 rounded-pill">Subscribe</button>
            </div>
        </div>
    </div>
</section>




@endsection



