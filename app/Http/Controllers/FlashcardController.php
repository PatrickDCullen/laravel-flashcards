<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\User;
use App\Models\Flashcard;
use App\Http\Requests\StoreFlashcardRequest;
use App\Http\Requests\UpdateFlashcardRequest;

class FlashcardController extends Controller
{
    public function index(User $user, Deck $deck)
    {
        if ($user->id !== auth()->id()) {
            abort(403);
        }

        return view('flashcards.index', ['user' => $user, 'deck' => $deck]);
    }

    public function create(User $user, Deck $deck)
    {
        if ($user->id !== auth()->id()) {
            abort(403);
        }

        return view('flashcards.create', ['user' => $user, 'deck' => $deck]);
    }

    public function store(StoreFlashcardRequest $request, User $user, Deck $deck)
    {
        if ($user->id !== auth()->id()) {
            abort(403);
        }

        Flashcard::create([
            'term' => $request['term'],
            'definition' => $request['definition'],
            'deck_id' => $deck->id
        ]);

        $request->session()->flash('term', $request['term']);

        return redirect()->route('flashcards.create', [$user->id, $deck->id]);
    }

    public function showFront(User $user, Deck $deck, Flashcard $flashcard)
    {
        if ($user->id !== auth()->id()) {
            abort(403);
        }

        return view('flashcards.showFront', ['user' => $user, 'deck' => $deck, 'flashcard' => $flashcard]);
    }

    public function showBack(User $user, Deck $deck, Flashcard $flashcard)
    {
        if ($user->id !== auth()->id()) {
            abort(403);
        }

        $first = Flashcard::where('deck_id', '=', $deck->id)->where('id', '<=', $flashcard->id)->min('id');
        $next = Flashcard::where('deck_id', '=', $deck->id)->where('id', '>', $flashcard->id)->min('id');

        return view('flashcards.showBack',
            ['user' => $user, 'deck' => $deck, 'flashcard' => $flashcard, 'next' => $next, 'first' => $first]
        );
    }

    public function edit(User $user, Deck $deck, Flashcard $flashcard)
    {
        if ($user->id !== auth()->id()) {
            abort(403);
        }

        return view('flashcards.edit', ['user' => $user, 'deck' => $deck, 'flashcard' => $flashcard]);
    }

    public function update(UpdateFlashcardRequest $request, User $user, Deck $deck, Flashcard $flashcard)
    {
        if ($user->id !== auth()->id()) {
            abort(403);
        }

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
        if ($user->id !== auth()->id()) {
            abort(403);
        }

        Flashcard::destroy($flashcard->id);

        return redirect()->route('flashcards.index', [$user, $deck]);
    }
}
