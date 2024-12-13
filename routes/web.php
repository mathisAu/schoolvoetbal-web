<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\InscriptionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// Toon inlogformulier
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Verwerk inlog via web
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Uitloggen via web
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Toon het inschrijvingsformulier
Route::get('/inschrijven', [InscriptionController::class, 'showForm'])->name('inscription.form');

// Verwerk de inschrijving
Route::post('/inschrijven', [InscriptionController::class, 'storeInscription'])->name('inscription.store');


// routes/web.php

Route::get('/', function () {
    return view('homepage');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Team routes
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');  // Verander hier naar 'teams.index'
