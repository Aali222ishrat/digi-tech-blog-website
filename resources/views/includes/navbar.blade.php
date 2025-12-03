<!-- ======= Header / Navbar ======= -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/digi-tech-logo.png') }}" style="width:200px" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/blogs">Blogs</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>

                @if (Route::has('login'))
                <nav class="flex items-center">
                    @auth
                    @if (Auth::user()->role === 'admin')
                    <a href="{{ url('/admin/admin-dashboard') }}"
                        class="btn btn-sm btn-primary-custom text-white m-2">
                        Admin Dashboard
                    </a>
                    @elseif (Auth::user()->role === 'author')
                    <a href="{{ url('/author/author-dashboard') }}"
                        class="btn btn-sm btn-primary-custom text-white m-2">
                        Author Dashboard
                    </a>
                    @else
                    <a href="{{ url('/dashboard') }}"
                        class="btn btn-sm btn-primary-custom text-white m-2">
                        Dashboard
                    </a>
                    @endif
                    @else
                    <div class="link-style">
                        <a href="{{ route('login') }}"
                            class="btn btn-sm btn-primary-custom text-white m-2">
                            Log in
                        </a>
                    </div>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="btn btn-sm btn-primary-custom text-white m-2">
                        Register
                    </a>
                    @endif
                    @endauth
                </nav>
                @endif
            </ul>
        </div>
    </div>
</nav>