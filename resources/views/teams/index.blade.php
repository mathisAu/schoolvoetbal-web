<!-- resources/views/teams/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams</title>
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
                    <a href="/" class="text-white hover:text-blue-300 transition">Wedstrijden</a>
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
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        <h1 class="text-4xl font-bold text-center my-8">Teams</h1>
        <div class="container mx-auto px-4 py-8">
            @foreach ($teams as $team)
                <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
                    <h2 class="text-xl font-semibold">{{ $team->name }}</h2>
                    <p>{{ $team->description }}</p>
                </div>
            @endforeach
        </div>
    </main>

</body>
</html>
