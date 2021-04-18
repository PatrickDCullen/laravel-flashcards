<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $user = auth()->user();

        if ($user->flashcards->isNotEmpty()) {
            $deck = $user->flashcards->first()->deck_id;
            $flashcard = $user->flashcards->first()->id;
        } else {
            $deck = null;
            $flashcard = null;
        }

        return view('dashboard', ['user' => $user, 'deck' => $deck, 'flashcard' => $flashcard]);
    }
}
