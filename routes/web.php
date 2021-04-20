<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlashcardController;

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
    Route::get('/decks', [DeckController::class, 'index'])->name('decks.index');
    Route::get('/decks/create', [DeckController::class, 'create'])->name('decks.create');
    Route::post('/decks', [DeckController::class, 'store'])->name('decks.store');
    Route::get('/decks/{deck}', [DeckController::class, 'show'])->name('decks.show');
    Route::get('/decks/{deck}/edit', [DeckController::class, 'edit'])->name('decks.edit');
    Route::put('/decks/{deck}', [DeckController::class, 'update'])->name('decks.update');
    Route::delete('/decks/{deck}', [DeckController::class, 'destroy'])->name('decks.destroy')
        ->middleware(['password.confirm']);

    Route::get('/decks/{deck}/flashcards', [FlashcardController::class, 'index'])
        ->name('flashcards.index');
    Route::get('/decks/{deck}/flashcards/create', [FlashcardController::class, 'create'])
        ->name('flashcards.create');
    Route::post('/decks/{deck}/flashcards', [FlashcardController::class, 'store'])
        ->name('flashcards.store');

    Route::get('/decks/{deck}/flashcards/{flashcard:id}/front', [FlashcardController::class, 'showFront'])
        ->name('flashcards.showFront');
    Route::get('/decks/{deck}/flashcards/{flashcard:id}/back', [FlashcardController::class, 'showBack'])
        ->name('flashcards.showBack');

    Route::get('/decks/{deck}/flashcards/{flashcard:id}/edit', [FlashcardController::class, 'edit'])
        ->name('flashcards.edit');
    Route::put('/decks/{deck}/flashcards/{flashcard:id}', [FlashcardController::class, 'update'])
        ->name('flashcards.update');
    Route::delete('/decks/{deck}/flashcards/{flashcard:id}', [FlashcardController::class, 'destroy'])
        ->name('flashcards.destroy')->middleware(['password.confirm']);
});

Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
