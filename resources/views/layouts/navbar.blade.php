<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar met Dropdown</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-[#009fe3] text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('/images/fotovoetbal.jpg') }}" alt="Football Logo" class="h-30 w-40">
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="/" class="text-white hover:text-blue-300 transition">Home</a>

                    <!-- Dropdown for Speelschema -->
                    <div class="relative group">
                        <!-- Button -->
                        <button class="text-white hover:text-blue-300 transition focus:outline-none">
                            Speelschema
                        </button>

                        <!-- Dropdown Menu -->
                        <div
                            class="absolute hidden group-hover:flex flex-col bg-white text-blue-600 rounded shadow-lg py-2 z-10">
                            <a href="/speelschema" class="block px-4 py-2 hover:bg-gray-200">Schema</a>
                            <a href="/speelschema/genereren" class="block px-4 py-2 hover:bg-gray-200">Genereren</a>
                            <a href="/speelschema/scores" class="block px-4 py-2 hover:bg-gray-200">Scores</a>
                        </div>
                    </div>

                    <a href="{{ route('teams.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md">Teams</a>
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

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-blue-700 text-white">
            <a href="/" class="block px-4 py-2 hover:bg-blue-600">Home</a>
            <div class="border-t border-blue-500"></div>

            <!-- Dropdown for Speelschema in Mobile -->
            <div class="relative">
                <button id="mobile-speelschema-button" class="w-full text-left px-4 py-2 hover:bg-blue-600 focus:outline-none">
                    Speelschema
                </button>
                <div id="mobile-speelschema-dropdown" class="hidden bg-blue-800">
                    <a href="/speelschema" class="block px-4 py-2 hover:bg-blue-600">Schema</a>
                    <a href="/speelschema/genereren" class="block px-4 py-2 hover:bg-blue-600">Genereren</a>
                    <a href="/speelschema/scores" class="block px-4 py-2 hover:bg-blue-600">Scores</a>
                </div>
            </div>

            <a href="{{ route('teams.index') }}" class="block px-4 py-2 hover:bg-blue-600">Teams</a>
            <a href="#" class="block px-4 py-2 hover:bg-blue-600">Inschrijven</a>

            @auth
                <span class="block px-4 py-2">Dankjewel voor het inloggen, {{ Auth::user()->name }}!</span>
                <form action="/logout" method="POST" class="px-4 py-2">
                    @csrf
                    <button type="submit" class="w-full bg-white text-blue-600 px-4 py-2 rounded-md hover:bg-gray-200 transition">
                        Logout
                    </button>
                </form>
            @else
                <a href="/login" class="block px-4 py-2 hover:bg-blue-600">Login</a>
                <a href="/register" class="block px-4 py-2 hover:bg-blue-600">Register</a>
            @endauth
        </div>
    </nav>

    <script>
        // Mobile Menu Toggle
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Mobile Dropdown for Speelschema
        const speelschemaButton = document.getElementById('mobile-speelschema-button');
        const speelschemaDropdown = document.getElementById('mobile-speelschema-dropdown');
        speelschemaButton.addEventListener('click', () => {
            speelschemaDropdown.classList.toggle('hidden');
        });
    </script>
</body>
</html>
