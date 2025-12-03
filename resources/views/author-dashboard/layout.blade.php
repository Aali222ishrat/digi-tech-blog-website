<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Author Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- 🟩 Sidebar -->
        @include('author-dashboard.sidebar')

        <!-- 🟦 Main Content -->
        <div class="flex-grow-1" style="display:flex; flex-direction:column;">
            
            <!-- 🔹 Breeze Navigation (TOP) -->
            <div>
                @include('layouts.navigation')
            </div>

            

            <!-- 🔹 Main Content -->
            <main class="flex-grow-1  bg-light">
                @yield('content')
            </main>

            <!-- 🔹 Footer -->
            <footer class="mt-auto">
                @include('author-dashboard.footer')
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
