<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-12 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('/images/fotovoetbal.jpg') }}" alt="Football Logo" class="h-30 w-40">
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="/" class="text-white hover:text-blue-300 transition">Home</a>
                    <a href="/dashboard" class="text-white hover:text-blue-300 transition">Wedstrijden</a>
                    <a href="{{ route('teamspage') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md">Teams</a>
                    <a href="#" class="text-white hover:text-blue-300 transition">Inschrijven</a>

                    @auth
                        <span class="text-sm">Dankjewel voor het inloggen, {{ Auth::user()->name }}!</span>
                        <form action="/logout" method="POST" class="ml-4">
                            @csrf
                            <button type="submit" class="bg-white text-blue-600 px-4 py-2 rounded-md hover:bg-gray-200 transition">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="/login" class="bg-white text-blue-600 px-4 py-2 rounded-md hover:bg-gray-200 transition">
                            Login
                        </a>
                        <a href="/register" class="bg-white text-blue-600 px-4 py-2 rounded-md hover:bg-gray-200 transition">
                            Register
                        </a>
                    @endauth
                </div>

                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
