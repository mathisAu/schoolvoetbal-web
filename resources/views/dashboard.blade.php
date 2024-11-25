<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto px-12 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('/images/fotovoetbal.jpg') }}" alt="Football Logo" class="h-20 w-30">
                </div>

                <!-- Desktop Menu -->
                <div class="md:flex space-x-8 items-center">
                    <a href="/" class="text-white hover:text-blue-300 transition">Home</a>
                    <a href="#" class="text-white hover:text-blue-300 transition">Wedstrijden</a>
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
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
