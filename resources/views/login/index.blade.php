<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Voeg Tailwind CSS toe -->
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Formulier Container -->
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Inloggen</h1>

        <!-- Fouten tonen -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 border border-red-300 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Inlogformulier -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">E-mailadres</label>
                <input type="email" name="email" id="email" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Vul je e-mailadres in">
            </div>

            <!-- Wachtwoord -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Wachtwoord</label>
                <input type="password" name="password" id="password" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Vul je wachtwoord in">
            </div>

            <!-- Submit knop -->
            <div>
                <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">Inloggen</button>
            </div>
        </form>

        <!-- Link naar registratiepagina -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Heb je nog geen account? <a href="/register" class="text-blue-600 hover:underline">Registreren</a></p>
        </div>
    </div>

</body>
</html>
