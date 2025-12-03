<div class="bg-primary text-white p-3" style="width:250px; height:100vh;">
    <div>
        <img src="{{ asset('images/digi-tech-logo.png') }}" style="width:200px" alt="logo">
    </div>

    <ul class="nav flex-column">

        <!-- Dashboard -->
        <li class="nav-item">
            <a href="{{ route('author.dashboard') }}" class="nav-link text-white">🏠 Dashboard</a>
        </li>

        <!--Categories-->
        <li class="nav-item mt-1">
            <a href="{{ route('author-dashboard.categories.index') }}" class="nav-link text-white ">🏠 Categories</a>
        </li>

        <!-- Manage Blogs -->
        <li class="nav-item">
            <span class="text-black small ms-2 fw-bold">Manage Blogs</span>
        </li>

        <li class="nav-item">
            <a href="{{ route('author-dashboard.blogs.index') }}" class="nav-link text-white">📄 View All Blogs</a>
        </li>

        <li class="nav-item">
            <a href="{{ route('author-dashboard.blogs.create') }}" class="nav-link text-white">➕ Add New Blog</a>
        </li>

        <!-- Tags -->
        <li class="nav-item mt-3">
            <span class="text-black small ms-2 fw-bold">Tags</span>
        </li>

        <li class="nav-item">
            <a href="{{ route('author-dashboard.tags.index') }}" class="nav-link text-white">🔖 View Tags</a>
        </li>

        <li class="nav-item">
            <a href="{{ route('author-dashboard.tags.create') }}" class="nav-link text-white">➕ Add Tag</a>
        </li>

        <!-- Comments -->
        <li class="nav-item mt-3">
            <a href="{{ route('author-dashboard.comments.index') }}" class="nav-link text-white">💬 Manage Comments</a>
        </li>

        <!-- Settings -->
        <li class="nav-item mt-3">
            <a href="#" class="nav-link text-white">⚙️ Settings</a>
        </li>

        <!-- Logout -->
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link text-danger mt-3 fs-4 fw-bold">🚪 Logout</a>
        </li>
    </ul>
</div>
