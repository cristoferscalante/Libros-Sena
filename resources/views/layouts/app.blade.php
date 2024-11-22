<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black">
    <div id="app">
        <!-- Navbar -->
        <nav class="bg-[#2e2e2e] shadow-md">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <!-- Branding -->
                    <div class="flex-shrink-0 flex items-center gap-6">
                        <a href="{{ url('/') }}" class="text-xl font-bold text-white">
                            {{ 'Libreria' }}
                        </a>
                        
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden md:flex space-x-8">
                        <ul class="flex items-center space-x-4">
                            <!-- Authentication Links -->

                            <a href="{{url('/libros')}}" class="text-sm font-bold text-white">{{'Libros'}}</a>
                            @guest
                                @if (Route::has('login'))
                                    <li>
                                        <a href="{{ route('login') }}" class="text-white hover:text-slate-300">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}" class="text-white hover:text-slate-300 ">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="relative">
                                    <button class="text-sm font-bold text-white focus:outline-none" id="user-menu" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md py-2 z-10 hidden" id="dropdown-menu">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('Profile') }}</a>
                                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="flex items-center md:hidden">
                        <button id="mobile-menu-toggle" class="text-gray-500 hover:text-gray-600 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden" id="mobile-menu" style="display: none;">
                <ul class="px-4 py-2 space-y-1">
                    @guest
                        @if (Route::has('login'))
                            <li>
                                <a href="{{ route('login') }}" class="block text-gray-600 hover:text-gray-800">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="block text-gray-600 hover:text-gray-800">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="#" class="block text-gray-600 hover:text-gray-800">{{ Auth::user()->name }}</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="block text-gray-600 hover:text-gray-800"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-0">
            @yield('content')
        </main>
    </div>

    <!-- Mobile Menu Toggle Script -->
    <script>
        document.getElementById('mobile-menu-toggle').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.style.display = menu.style.display === 'none' || menu.style.display === '' ? 'block' : 'none';
        });
    </script>
</body>
</html>
