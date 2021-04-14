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
        if ($deck->user_id !== auth()->id()) {
            abort(403);
        }

        return view('flashcards.index', ['user' => $user, 'deck' => $deck]);
    }

    public function create(User $user, Deck $deck)
    {
        if ($user->id !== auth()->id()) {
            abort(403);
        }
        if ($deck->user_id !== auth()->id()) {
            abort(403);
        }

        return view('flashcards.create', ['user' => $user, 'deck' => $deck]);
    }

    public function store(StoreFlashcardRequest $request, User $user, Deck $deck)
    {
        if ($user->id !== auth()->id()) {
            abort(403);
        }
        if ($deck->user_id !== auth()->id()) {
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

    public function show(User $user, Deck $deck, Flashcard $flashcard)
    {
        if ($user->id !== auth()->id()) {
            abort(403);
        }
        if ($deck->user_id !== auth()->id()) {
            abort(403);
        }
        if ($flashcard->deck_id !== $deck->id) {
            abort(403);
        }
        // conditionally set next... check if another flashcard exists
        // if it does, set next as below. If it doesn't, set next to false
        // then, in the view, if next exists show the next button
        // if next is false, have a message saying last flashcard and set first?

        // also, is the query automatically scoped to only check for the flashcards within
        // the deck? you can test this by having multiple decks with flashcards
        // Currently you can access any deck and card from any user and deck.
        // Need to add authorization
        $next = Flashcard::where('deck_id', '=', $deck->id)->where('id', '>', $flashcard->id)->min('id');

        return view('flashcards.show', ['user' => $user, 'deck' => $deck, 'flashcard' => $flashcard, 'next' => $next]);
    }

    public function edit(User $user, Deck $deck, Flashcard $flashcard)
    {
        if ($user->id !== auth()->id()) {
            abort(403);
        }
        if ($deck->user_id !== auth()->id()) {
            abort(403);
        }
        if ($flashcard->deck_id !== $deck->id) {
            abort(403);
        }

        return view('flashcards.edit', ['user' => $user, 'deck' => $deck, 'flashcard' => $flashcard]);
    }

    public function update(UpdateFlashcardRequest $request, User $user, Deck $deck, Flashcard $flashcard)
    {
        if ($user->id !== auth()->id()) {
            abort(403);
        }
        if ($deck->user_id !== auth()->id()) {
            abort(403);
        }
        if ($flashcard->deck_id !== $deck->id) {
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
        if ($deck->user_id !== auth()->id()) {
            abort(403);
        }
        if ($flashcard->deck_id !== $deck->id) {
            abort(403);
        }

        Flashcard::destroy($flashcard->id);

        return redirect()->route('flashcards.index', [$user, $deck]);
    }
}
