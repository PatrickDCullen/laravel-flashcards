<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\User;
use App\Http\Requests\StoreDeckRequest;
use App\Http\Requests\UpdateDeckRequest;

class DeckController extends Controller
{
    public function index(User $user)
    {
        return view('decks.index', ['user' => $user]);
    }

    public function create(User $user)
    {
        return view('decks.create', ['user' => $user]);
    }

    public function store(StoreDeckRequest $request, User $user)
    {
        Deck::create([
            'topic' => $request['topic'],
            'user_id' => $user->id
        ]);

        $request->session()->flash('topic', $request['topic']);

        return redirect()->route('decks.create', [$user->id]);
    }

    public function show(User $user, Deck $deck)
    {
        return view('decks.show', ['user' => $user, 'deck' => $deck]);
    }

    public function edit(User $user, Deck $deck)
    {
        return view('decks.edit', ['user' => $user, 'deck' => $deck]);
    }

    public function update(UpdateDeckRequest $request, User $user, Deck $deck)
    {
        $deck = Deck::findOrFail($deck->id);
        $deck->topic = $request['topic'];
        $deck->save();

        $request->session()->flash('topic', $request['topic']);

        return redirect()->route('decks.show', ['user' => $user, 'deck' => $deck]);
    }

    public function destroy(User $user, Deck $deck)
    {
        Deck::destroy($deck->id);

        return redirect()->route('decks.index', ['user' => $user]);
    }
}
