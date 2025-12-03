<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'DigiSkills Clone')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Animate.css -->
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- AOS Animation -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Lightbox -->
<link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
<link rel="preload" href="{{ asset('fonts/whatever-if-needed.woff2') }}" as="font" type="font/woff2" crossorigin>
    <style>
    /* DigiSkills like palette */
    :root {
        --primary: #0070BA;
        --accent: #FFC107;
        --muted: #F8F9FA;
    }

    body {
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        background-color:red;
    }

    .bg-primary-custom {
        background-color: var(--primary);
        color: white;
    }

    .btn-primary-custom {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .btn-primary-custom {
  position: relative;
  
  background: #007bff;
  color: #fff !important;
  border: none;
  
  padding: 8px 20px;
  font-weight: 500;
  text-decoration: none;
  transition: all 0.4s ease;
  overflow: hidden;
  z-index: 1;
  cursor: pointer;
}

/* Glowing border animation */
.btn-primary-custom::before {
  content: "";
  position: absolute;
  inset: 0;
  
  padding: 2px;
  
  background-size: 200%;
  -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
  -webkit-mask-composite: xor;
  mask-composite: exclude;
  animation: glowBorder 3s linear infinite;
  transition: all 0.5s ease;
}

/* Subtle inner light flash */
.btn-primary-custom::after {
  content: "";
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
  transform: scale(0);
  transition: transform 0.5s ease;
  z-index: 0;
}

/* Hover effects */
.btn-primary-custom:hover::after {
  transform: scale(1);
}

.btn-primary-custom:hover {
  background: #000;
  color: #fff !important;
  box-shadow: 0 0 25px rgba(0, 123, 255, 0.6), 0 0 35px rgba(0, 224, 255, 0.4);
}


    .course-card img {
        height: 160px;
        object-fit: cover;
    }

    footer {
        background: #0f1720;
        color: #cbd5e1;
    }

    .badge-accent {
        background: var(--accent);
        color: #0f1720;
    }

    .partner-logo {
        opacity: 0.85;
        max-height: 50px;
    }

    .section-title {
        color: var(--primary);
    }

    .card-border {
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

   .hero-slider {
    width: 100%;
    position: relative;
    padding: 30px 0;
    background: #0d114d;
}

/* Hide ALL slides */
.slide {
    display: none !important;
    width: 90%;
    margin: auto;
    height: 400px;
    background: #ffd000; /* Yellow background */
    align-items: center;
    justify-content: space-between;
    position: relative;
    display:flex;
    
   
}
.right{
    width: 35%;
    height: 100%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}
.right.overlap {
    position: relative;
}
/* Show ONLY the active slide */
.slide.active {
    display: flex !important;
   
    
}

.left {
    width: 65%;
    height: 100%;
   background: #1a1f5c;
background: linear-gradient(0deg,rgba(26, 31, 92, 1) 1%, rgba(2, 0, 36, 1) 100%);
    padding: 60px 50px;
    margin-left: 80px; /* ⭐ small space on left */
    

    /* Perfect curve like your screenshot */
    border-top-right-radius: 180px;
    border-bottom-right-radius: 180px;

    /* Normal left corners */
    border-top-left-radius: 50px;
    border-bottom-left-radius: 50px;

    display: flex;
    flex-direction: column;
    justify-content: center;
    
}

.left h2 {
    font-size: 32px;
    color: #ffd000;
    animation-delay: 0.1s;
}

.left p { 
animation-delay: 0.2s;
 }
.left .controls { 
animation-delay: 0.3s; 
}

.read-more {
    background: #ffd000;
    color: #000;
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
}

.btn {
    background: #ffd000;
    border: none;
    padding: 8px 16px;
    margin-left: 10px;
    cursor: pointer;
    border-radius: 6px;
}

/* Circular image */
.circle {
    width: 400px;
    height: 400px;
    border-radius: 50%;
   /* border: 12px solid #FFD000;*/
    overflow: hidden;
    /* Overlap correctly */
    position: absolute;
    left: -0px;       /* ⭐ move right */
    transform: translateX(-20%); /* ⭐ overlap 20% into blue side */
   
    
}



.circle img {
   width: 100%;
    height: 100%;
    object-fit: cover;
    
}

/* Dots */
.dots {
    text-align: center;
    margin-top: 20px;
}
.dot {
    width: 12px;
    height: 12px;
    background: #555;
    border-radius: 50%;
    display: inline-block;
    margin: 5px;
    cursor: pointer;
}
.dot.active {
    background: #ffd000;
}

/* ===========================================
   RESPONSIVE DESIGN
=========================================== */

/* Tablets */
@media (max-width: 992px) {

    .slide {
        height: 350px;
    }

    .left {
        margin-left: 40px;
        padding: 40px 30px;
        width: 60%;
    }

    .left h2 {
        font-size: 26px;
    }

    .circle {
        width: 280px;
        height: 280px;
        left: -20px;
        transform: translateX(-5%);
    }
}

/* Mobile Landscape / Small Tablets */
@media (max-width: 768px) {

    .slide {
        flex-direction: column;
        height: auto;
        padding: 20px 0;
    }

    .left {
        width: 100%;
        margin-left: 0;
        border-radius: 30px;
        padding: 30px 25px;
        text-align: center;
    }

    .right {
        width: 100%;
        height: auto;
        margin-top: 20px;
        position: relative;
    }

    .circle {
        position: relative;
        width: 220px;
        height: 220px;
        left: 0;
        transform: translateX(0);
        margin: auto;
    }

    .left h2 {
        font-size: 22px;
    }

    .left p {
        font-size: 14px;
    }

    .controls {
        justify-content: center;
    }
}

/* Mobile Portrait */
@media (max-width: 480px) {

    .left {
        padding: 25px 20px;
    }

    .left h2 {
        font-size: 20px;
    }

    .circle {
        width: 180px;
        height: 180px;
    }

    .dot {
        width: 10px;
        height: 10px;
    }

}


    /* Main Card Styling */
    .course-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 4px 15px rgba(0,0,0,0.07);
        transition: all 0.35s ease-in-out;
        position: relative;
    }

    /* Hover Effect */
    .course-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.15);
        border: 1px solid rgba(0, 123, 255, 0.4);
    }

    /* Image Zoom on Hover */
    .course-card img {
        height: 200px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .course-card:hover img {
        transform: scale(1.05);
    }

    /* Card Title */
    .course-card .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #222;
    }

    .section-title {
        font-weight: 700;
        font-size: 1.6rem;
    }

    /* Card Body Styling */
    .course-card .card-body {
        padding: 18px;
    }

    /* Badge more stylish */
    .course-card .badge {
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 0.75rem;
    }

    .category-card {
        background: linear-gradient(135deg, #ffffff, #f0f4ff);
        transition: 0.3s ease-in-out;
        border: 1px solid #e3e7ff;
    }
    .category-card:hover {
        transform: translateY(-7px);
        box-shadow: 0px 10px 25px rgba(0,0,0,0.12);
    }
    .icon-box {
        width: 60px;
        height: 60px;
        background: #e6e9ff;
        color: #4b5bff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 28px;
        border-radius: 50%;
    }

    
        .newsletter-box {
            background: linear-gradient(90deg,#2575fc,#6a11cb);
            padding: 40px;
            border-radius: 20px;
            color: white;
        }

        .hero {
background: linear-gradient(135deg, #007bff, #6610f2);
color: white;
padding: 80px 20px;
text-align: center;
}
.hero h1 {
font-size: 48px;
font-weight: 700;
}
.section-title {
font-size: 32px;
font-weight: 700;
color: #222;
}
.content-box {
background: white;
border-radius: 20px;
padding: 40px;
margin-bottom: 30px;
box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.cta-box {
background: linear-gradient(135deg, #6610f2, #007bff);
color: white;
padding: 50px;
border-radius: 20px;
}
.cta-box a {
background: white;
color: #007bff;
padding: 12px 30px;
border-radius: 30px;
font-size: 18px;
text-decoration: none;
font-weight: 600;
}
/* Animations */
.fade-in {
animation: fadeIn 1s ease-in forwards;
opacity: 0;
}
@keyframes fadeIn {
to { opacity: 1; }
}
.content-box:hover {
transform: translateY(-8px);
transition: .4s;
box-shadow: 0 8px 30px rgba(0,0,0,0.15);
}
.cta-box:hover {
transform: scale(1.02);
transition: .4s;
}
</style>


    

  </head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col min-h-screen">

  @include('includes.navbar')
   @if(request()->is('/'))  {{-- Only show on homepage --}}
    @include('includes.slider')
@endif

    <main class="py-4">
        @yield('content')
    </main>
    
    
    @include('includes.footer')

    <script>
document.addEventListener("DOMContentLoaded", function () {
  const totalSlides = document.querySelectorAll(".myCategorySlider .swiper-slide").length;
  const slidesToView = 4; // Default slides per view

  var swiper = new Swiper(".myCategorySlider", {
    slidesPerView: totalSlides < slidesToView ? totalSlides : slidesToView,
    spaceBetween: 20,
    loop: totalSlides > slidesToView, // Loop only if enough slides
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      320: { slidesPerView: 1 },
      576: { slidesPerView: Math.min(totalSlides, 2) },
      768: { slidesPerView: Math.min(totalSlides, 3) },
      992: { slidesPerView: Math.min(totalSlides, 4) }
    }
  });
});
</script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



</body>

</html>