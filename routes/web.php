<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('characters', CharacterController::class)->except(['edit','update','destroy']);

Route::get('/game/{id}', [CharacterController::class, 'play'])->name('characters.play');
Route::post('/game/{id}/action', [CharacterController::class, 'action'])->name('characters.action');
