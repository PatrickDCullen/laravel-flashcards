<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeckController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/users/{id}/decks', [DeckController::class, 'index'])->name('decks.index');
    Route::get('/users/{id}/decks/create', [DeckController::class, 'create'])->name('decks.create');
    Route::post('/users/{id}/decks', [DeckController::class, 'store'])->name('decks.store');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
