<div class="bg-primary text-white p-3 position-fixed" style="width:250px; height:100vh; overflow-y:auto;">
    <div><img src="{{ asset('images/digi-tech-logo.png') }}" style="width:200px" alt="logo"></div>
    <ul class="nav flex-column">
        <li class="nav-item"><a href="{{ route('author.dashboard') }}" class="nav-link text-white">🏠 Dashboard</a></li>
        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" data-bs-toggle="collapse" href="#categoryMenu" role="button" aria-expanded="false" aria-controls="categoryMenu">
                🏷️ Manage Blogs
            </a>
            <div class="collapse" id="categoryMenu">
                <ul class="list-unstyled ps-3">
                    <li><a href="{{ route('author-dashboard.blogs.create') }}" class="nav-link text-white dropdown-item">➕ Add Blogs</a></li>
                    <li><a href="{{ route('author-dashboard.blogs.index') }}" class="nav-link text-white dropdown-item">📋 View Blogs</a></li>
                </ul>
            </div>
        </li>
        
        <li class="nav-item"><a href="{{ route('author-dashboard.tags.index') }}" class="nav-link text-white">🔖 Tags</a></li>
        <li class="nav-item"><a href="{{ route('author-dashboard.comments.index') }}" class="nav-link text-white">💬 Comments</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white">⚙️ Settings</a></li>
        <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link text-danger mt-3">🚪 Logout</a></li>
    </ul>
</div>
