<!-- resources/views/teams/inschrijving.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Inschrijven voor een Team</h1>

        <form action="{{ route('inscription.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="team_id" class="block text-sm font-medium text-gray-700">Kies een Team (optioneel)</label>
                <select id="team_id" name="team_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Geen Team kiezen</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Inschrijven</button>
        </form>
    </div>
@endsection
