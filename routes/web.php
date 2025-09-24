<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;

// Tela inicial
Route::get('/', function () {
    return view('welcome'); // resources/views/welcome.blade.php
})->name('home');

// Personagem
Route::get('/characters/create', [CharacterController::class, 'create'])->name('characters.create');
Route::post('/characters/store', [CharacterController::class, 'store'])->name('characters.store');
Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');

// Jogar
Route::get('/game/{id}', [CharacterController::class, 'play'])->name('characters.play');
