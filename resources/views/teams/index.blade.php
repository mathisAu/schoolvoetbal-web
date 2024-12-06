<x-layouts.app>
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
</x-layouts.app>
