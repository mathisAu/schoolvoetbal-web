@extends('layouts.navbar')

@section('content')
    <!-- Meta tags en title -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams</title>

    <!-- Pagina-inhoud -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8">Welkom op de Teams Pagina!</h1>

        <!-- Sectie voor Teams -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Team 1 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Team 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-blue-600">Team A</h2>
                    <p class="text-gray-600 mt-2">Beschrijving van Team A. Dit team is erg goed in teamwork en strategie.</p>
                    <a href="#" class="mt-4 inline-block text-blue-600 hover:underline">Lees meer</a>
                </div>
            </div>

            <!-- Team 2 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Team 2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-blue-600">Team B</h2>
                    <p class="text-gray-600 mt-2">Beschrijving van Team B. Dit team is snel en effectief in hun aanpak.</p>
                    <a href="#" class="mt-4 inline-block text-blue-600 hover:underline">Lees meer</a>
                </div>
            </div>

            <!-- Team 3 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Team 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-blue-600">Team C</h2>
                    <p class="text-gray-600 mt-2">Beschrijving van Team C. Dit team heeft geweldige vaardigheden op het veld.</p>
                    <a href="#" class="mt-4 inline-block text-blue-600 hover:underline">Lees meer</a>
                </div>
            </div>

            <!-- Voeg de andere teams hier toe -->
        </div>
    </div>
@endsection
