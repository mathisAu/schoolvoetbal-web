<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Toon het inlogformulier (voor website).
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Geeft het loginformulier weer voor webgebruikers
    }

    /**
     * Verwerk het inlogverzoek voor webgebruikers.
     */
    public function login(Request $request)
    {
        // Valideer de invoer
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Poging om in te loggen via web (session-based)
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect naar de homepage of dashboard bij succesvolle login
            return redirect()->intended('/');
        }

        // Foutmelding bij mislukte login via web
        return back()->withErrors([
            'email' => 'De inloggegevens zijn onjuist.',
        ]);
    }

    /**
     * Verwerk de login voor de API (mobiele app of andere API-gebruikers).
     */
    public function apiLogin(Request $request)
    {
        // Valideer de invoer voor de API-login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Poging om in te loggen via API (via Auth)
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Genereer een API-token voor de gebruiker
            $token = $user->createToken('GokAppToken')->plainTextToken;

            // Retourneer de token en gebruikersgegevens
            return response()->json([
                'message' => 'Login succesvol!',
                'token' => $token,
                'user' => $user,
            ]);
        }

        // Foutmelding bij mislukte login via API
        return response()->json([
            'error' => 'De inloggegevens zijn onjuist.',
        ], 401); // HTTP 401 Unauthorized
    }

    /**
     * Uitlogfunctionaliteit (voor zowel web als API).
     */
    public function logout(Request $request)
    {
        // Controleer of de request een API-aanroep is
        if ($request->expectsJson()) {
            // Verwijder de tokens voor API-gebruikers
            if ($request->user()) {
                $request->user()->tokens->each(function ($token) {
                    $token->delete();
                });
            }

            // Retourneer een JSON response voor API-gebruikers
            return response()->json(['message' => 'Uitgelogd']);
        }

        // Web logout (normale website gebruikers)
        Auth::logout();
        $request->session()->invalidate();  // Ongeldig maken van de sessie
        $request->session()->regenerateToken();  // Token regenereren voor CSRF-beveiliging

        // Redirect naar de homepage na uitloggen
        return redirect('/');  // Redirect naar de homepagina
    }
}
