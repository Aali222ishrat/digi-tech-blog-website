<div class="bg-dark text-white p-3" style="width:250px; height:100vh;">
    <div><img src="{{ asset('images/digi-tech-logo.png') }}" style="width:200px" alt="logo"></div>
    <ul class="nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link text-white">🏠 Dashboard</a></li>
       <!-- Manage Blogs -->
        <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#blogMenu" role="button"
               aria-expanded="false" aria-controls="blogMenu">
                📰 Manage Blogs
            </a>
            <div class="collapse" id="blogMenu">
                <ul class="list-unstyled ps-3">
                    <li>
                        <a href="{{ route('admin-dashboard.blogs.create') }}" class="nav-link text-white">➕ Add Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('admin-dashboard.blogs.index') }}" class="nav-link text-white">📋 View Blogs</a>
                    </li>
                    <li>
                        <a href="{{ route('admin-dashboard.blogs.index') }}?status=pending" class="nav-link text-white">
                            📝 Pending Blogs
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        

        <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#categoryMenu" role="button" aria-expanded="false" aria-controls="categoryMenu">
                🏷️ Manage Categories
            </a>
            <div class="collapse" id="categoryMenu">
                <ul class="list-unstyled ps-3">
                    <li><a href="{{ route('admin-dashboard.categories.create') }}" class="nav-link text-white">➕ Add Category</a></li>
                    <li><a href="{{ route('admin-dashboard.categories.index') }}" class="nav-link text-white">📋 View Categories</a></li>
                </ul>
            </div>
        </li>


        <!-- Manage Slider -->
        
        <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#sliderMenu" role="button" aria-expanded="false" aria-controls="categoryMenu">
                🏷️ Manage Slider
            </a>
            <div class="collapse" id="sliderMenu">
                <ul class="list-unstyled ps-3">
                    <li><a href="{{ route('admin-dashboard.slider.create') }}" class="nav-link text-white">➕ Add Slider</a></li>
                    <li><a href="{{ route('admin-dashboard.slider.index') }}" class="nav-link text-white">📋 View Slider</a></li>
                </ul>
            </div>
        </li>
        
        <li class="nav-item"><a href="#" class="nav-link text-white">🔖 Tags</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white">💬 Comments</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white">⚙️ Settings</a></li>
        <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link text-danger mt-3">🚪 Logout</a></li>
    </ul>
</div>
