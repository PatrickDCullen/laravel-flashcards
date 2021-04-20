<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\Flashcard;
use App\Http\Requests\StoreFlashcardRequest;
use App\Http\Requests\UpdateFlashcardRequest;

class FlashcardController extends Controller
{
    public function index(Deck $deck)
    {
        return view('flashcards.index', ['user' => auth()->user(), 'deck' => $deck]);
    }

    public function create(Deck $deck)
    {
        return view('flashcards.create', ['user' => auth()->user(), 'deck' => $deck]);
    }

    public function store(StoreFlashcardRequest $request, Deck $deck)
    {
        Flashcard::create([
            'term' => $request['term'],
            'definition' => $request['definition'],
            'deck_id' => $deck->id
        ]);

        $request->session()->flash('term', $request['term']);

        return redirect()->route('flashcards.create', [$deck->id]);
    }

    public function showFront(Deck $deck, Flashcard $flashcard)
    {
        return view('flashcards.showFront', ['user' => auth()->user(), 'deck' => $deck, 'flashcard' => $flashcard]);
    }

    public function showBack(Deck $deck, Flashcard $flashcard)
    {
        $first = Flashcard::where('deck_id', '=', $deck->id)->where('id', '<=', $flashcard->id)->min('id');
        $next = Flashcard::where('deck_id', '=', $deck->id)->where('id', '>', $flashcard->id)->min('id');

        return view('flashcards.showBack',
            ['user' => auth()->user(), 'deck' => $deck, 'flashcard' => $flashcard, 'next' => $next, 'first' => $first]
        );
    }

    public function edit(Deck $deck, Flashcard $flashcard)
    {
        return view('flashcards.edit', ['user' => auth()->user(), 'deck' => $deck, 'flashcard' => $flashcard]);
    }

    public function update(UpdateFlashcardRequest $request, Deck $deck, Flashcard $flashcard)
    {
        $flashcard = Flashcard::findOrFail($flashcard->id);
        $flashcard->term = $request['term'];
        $flashcard->definition = $request['definition'];
        $flashcard->save();

        $request->session()->flash('term', $request['term']);
        $request->session()->flash('definition', $request['definition']);

        return redirect()->route('flashcards.showFront', [$deck, $flashcard]);
    }

    public function destroy(Deck $deck, Flashcard $flashcard)
    {
        Flashcard::destroy($flashcard->id);

        return redirect()->route('flashcards.index', [auth()->user(), $deck]);
    }
}
