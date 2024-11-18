<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class InscriptionController extends Controller
{
    // Toon het inschrijvingsformulier
    public function showForm()
    {
        // Haal alle teams op om ze in het formulier weer te geven
        $teams = Team::all();
        return view('teams.inschrijving', compact('teams')); // Zorg ervoor dat de view 'teams.inschrijving' is
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
        $inscription->team_id = $request->team_id; // Gebruik de ingevulde team_id
        $inscription->save();

        // Redirect naar de teams pagina
        return redirect()->route('teams.index')->with('success', 'Je hebt je succesvol ingeschreven!');
    }
}
