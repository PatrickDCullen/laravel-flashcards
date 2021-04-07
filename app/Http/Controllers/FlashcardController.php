<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\Flashcard;
use App\Models\User;
use Illuminate\Http\Request;

class FlashcardController extends Controller
{
    public function index(User $user, Deck $deck)
    {
        return view('flashcards.index', ['user' => $user, 'deck' => $deck]);
    }

    public function create(User $user, Deck $deck)
    {
        return view('flashcards.create', ['user' => $user, 'deck' => $deck]);
    }

    public function store(Request $request, User $user, Deck $deck)
    {
        $request->validate([
            'term' => 'required',
            'definition' => 'required'
        ]);

        Flashcard::create([
            'term' => $request['term'],
            'definition' => $request['definition'],
            'deck_id' => $deck->id
        ]);

        $request->session()->flash('term', $request['term']);

        return redirect()->route('flashcards.create', [$user->id, $deck->id]);
    }

    public function show(User $user, Deck $deck, Flashcard $flashcard)
    {
        return view('flashcards.show', ['user' => $user, 'deck' => $deck, 'flashcard' => $flashcard]);
    }
}
