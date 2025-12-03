<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

    <!-- Header -->
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ url('/admin/admin-dashboard') }}"
                            class="inline-block px-5 py-1.5 border text-[#1b1b18] dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Admin Dashboard
                        </a>
                    @elseif (Auth::user()->role === 'author')
                        <a href="{{ url('/author/author-dashboard') }}"
                            class="inline-block px-5 py-1.5 border text-[#1b1b18] dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Author Dashboard
                        </a>
                    @else
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 border text-[#1b1b18] dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Dashboard
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 text-[#1b1b18] dark:text-[#EDEDEC] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 border text-[#1b1b18] dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <!-- Main Section -->
    
    </div>

</body>
</html>
