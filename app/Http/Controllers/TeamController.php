<?php


// app/Http/Controllers/TeamController.php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Inscription;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Toon het formulier om in te schrijven
    public function showForm()
    {
        return view('teams.inscription');
    }

    // Verwerk de inschrijving
    public function storeInscription(Request $request)
    {
        // Valideer de invoer
        $request->validate([
            'team_id' => 'nullable|exists:teams,id', // Optioneel, als de gebruiker al bij een team hoort
        ]);

        // Maak een inschrijving aan
        $inscription = new Inscription();
        $inscription->user_id = auth()->user()->id;
        $inscription->team_id = null; // Nieuwe inschrijving zonder team
        $inscription->save();

        // Controleer of er nu 11 gebruikers zijn voor een team
        $inscriptionsCount = Inscription::whereNull('team_id')->count();

        if ($inscriptionsCount >= 11) {
            // Maak een nieuw team
            $team = Team::create([
                'name' => 'Team ' . (Team::count() + 1), // Geef het team een naam, bijvoorbeeld "Team 1"
                'description' => 'Nieuw team met 11 leden.',
                'image_url' => 'https://via.placeholder.com/300', // Voeg hier een afbeelding toe
            ]);

            // Ken het team toe aan de eerste 11 inschrijvingen
            $inscriptions = Inscription::whereNull('team_id')->limit(11)->get();
            foreach ($inscriptions as $inscription) {
                $inscription->team_id = $team->id;
                $inscription->save();
            }
        }

        // Redirect naar de teams pagina
        return redirect()->route('teams.index')->with('success', 'Je hebt je succesvol ingeschreven!');
    }

    // Toon de teams pagina
    public function index()
    {
        // Haal alle teams uit de database
        $teams = Team::all();

        // Geef de teams door aan de view
        return view('teams.index', compact('teams'));
    }
}
