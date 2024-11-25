<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'apiLogout']);

// API Login
Route::post('/login', [LoginController::class, 'apiLogin']);

// API Logout (via token)
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);

// Web route voor login (voor de traditionele webapp)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']); // Web-login form handling

// Web route voor uitloggen
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// API route voor het ophalen van alle teams
Route::get('/teams', [TeamController::class, 'getAllTeams']);

// API route voor het ophalen van specifieke teams (optioneel)
Route::get('/teams/{id}', [TeamController::class, 'getTeamById']);
