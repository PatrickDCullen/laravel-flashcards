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
    Route::get('/users/{user}/decks', [DeckController::class, 'index'])->name('decks.index');
    Route::get('/users/{user}/decks/create', [DeckController::class, 'create'])->name('decks.create');
    Route::post('/users/{user}/decks', [DeckController::class, 'store'])->name('decks.store');
    Route::get('/users/{user}/decks/{deck:id}', [DeckController::class, 'show'])->name('decks.show');
    Route::get('/users/{user}/decks/{deck:id}/edit', [DeckController::class, 'edit'])->name('decks.edit');
    Route::put('/users/{user}/decks/{deck:id}', [DeckController::class, 'update'])->name('decks.update');
    Route::delete('/users/{user}/decks/{deck:id}', [DeckController::class, 'destroy'])->name('decks.destroy')
        ->middleware(['password.confirm']);

    Route::get('/users/{user}/decks/{deck:id}/flashcards', [FlashcardController::class, 'index'])
        ->name('flashcards.index');
    Route::get('/users/{user}/decks/{deck:id}/flashcards/create', [FlashcardController::class, 'create'])
        ->name('flashcards.create');
    Route::post('/users/{user}/decks/{deck:id}/flashcards', [FlashcardController::class, 'store'])
        ->name('flashcards.store');

    Route::get('/users/{user}/decks/{deck:id}/flashcards/{flashcard:id}/front', [FlashcardController::class, 'showFront'])
        ->name('flashcards.showFront');
    Route::get('/users/{user}/decks/{deck:id}/flashcards/{flashcard:id}/back', [FlashcardController::class, 'showBack'])
        ->name('flashcards.showBack');

    Route::get('/users/{user}/decks/{deck:id}/flashcards/{flashcard:id}/edit', [FlashcardController::class, 'edit'])
        ->name('flashcards.edit');
    Route::put('/users/{user}/decks/{deck:id}/flashcards/{flashcard:id}', [FlashcardController::class, 'update'])
        ->name('flashcards.update');
    Route::delete('/users/{user}/decks/{deck:id}/flashcards/{flashcard:id}', [FlashcardController::class, 'destroy'])
        ->name('flashcards.destroy')->middleware(['password.confirm']);
});

Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
