<div class="hero-slider">
    <div class="slides">
        @foreach($sliders as $i => $s)
        <div class="slide {{ $i == 0 ? 'active' : '' }}">
            
            <div class="left text-white">
                <span class="date">{{ $s->created_at->format('Y-m-d H:i') }}</span>
                <h2>{{ $s->title }}</h2>
                <p>{{ \Illuminate\Support\Str::limit($s->description, 160) }}</p>

                <div class="controls">
                    <a href="#" class="read-more btn-primary-custom">READ MORE</a>
                    <button class="btn prev btn-primary-custom ">&larr;</button>
                    <button class="btn next btn-primary-custom">&rarr;</button>
                </div>
            </div>

            <div class="right">
                <div class="circle ">
                    <img src="{{ asset('uploads/slider/'.$s->image) }}">
                </div>
            </div>

        </div>
        @endforeach
    </div>

    <div class="dots">
        @foreach($sliders as $i => $s)
            <span class="dot {{ $i == 0 ? 'active' : '' }}" data-index="{{ $i }}"></span>
        @endforeach
    </div>
</div>


<script>
let current = 0;
const slides = document.querySelectorAll(".slide");
const dots = document.querySelectorAll(".dot");

function showSlide(i) {
    slides.forEach(slide => slide.classList.remove("active"));
    dots.forEach(dot => dot.classList.remove("active"));

    slides[i].classList.add("active");
    dots[i].classList.add("active");

    current = i;
}

document.querySelectorAll(".next").forEach(btn =>
    btn.onclick = () => showSlide((current + 1) % slides.length)
);

document.querySelectorAll(".prev").forEach(btn =>
    btn.onclick = () => showSlide((current - 1 + slides.length) % slides.length)
);

dots.forEach(dot =>
    dot.onclick = () => showSlide(Number(dot.dataset.index))
);

// Auto Slide
setInterval(() => {
    showSlide((current + 1) % slides.length);
}, 5000);
</script>
