<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\User;
use App\Models\Flashcard;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFlashcardRequest;
use App\Http\Requests\UpdateFlashcardRequest;

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

    public function store(StoreFlashcardRequest $request, User $user, Deck $deck)
    {
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

    public function edit(User $user, Deck $deck, Flashcard $flashcard)
    {
        return view('flashcards.edit', ['user' => $user, 'deck' => $deck, 'flashcard' => $flashcard]);
    }

    public function update(UpdateFlashcardRequest $request, User $user, Deck $deck, Flashcard $flashcard)
    {
        $flashcard = Flashcard::findOrFail($flashcard->id);
        $flashcard->term = $request['term'];
        $flashcard->definition = $request['definition'];
        $flashcard->save();

        $request->session()->flash('term', $request['term']);
        $request->session()->flash('definition', $request['definition']);

        return redirect()->route('flashcards.show', [$user, $deck, $flashcard]);
    }

    public function destroy(User $user, Deck $deck, Flashcard $flashcard)
    {
        Flashcard::destroy($flashcard->id);

        return redirect()->route('flashcards.index', [$user, $deck]);
    }
}
