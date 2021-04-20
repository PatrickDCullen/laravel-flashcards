<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Http\Requests\StoreDeckRequest;
use App\Http\Requests\UpdateDeckRequest;

class DeckController extends Controller
{
    public function index()
    {
        return view('decks.index', ['user' => auth()->user()]);
    }

    public function create()
    {
        return view('decks.create', ['user' => auth()->user()]);
    }

    public function store(StoreDeckRequest $request)
    {
        Deck::create([
            'topic' => $request['topic'],
            'user_id' => auth()->id()
        ]);

        $request->session()->flash('topic', $request['topic']);

        return redirect()->route('decks.create', [auth()->id()]);
    }

    public function show(Deck $deck)
    {
        return view('decks.show', ['user' => auth()->user(), 'deck' => $deck]);
    }

    public function edit(Deck $deck)
    {
        return view('decks.edit', ['user' => auth()->user(), 'deck' => $deck]);
    }

    public function update(UpdateDeckRequest $request, Deck $deck)
    {
        $deck = Deck::findOrFail($deck->id);
        $deck->topic = $request['topic'];
        $deck->save();

        $request->session()->flash('topic', $request['topic']);

        return redirect()->route('decks.show', ['user' => auth()->user(), 'deck' => $deck]);
    }

    public function destroy(Deck $deck)
    {
        Deck::destroy($deck->id);

        return redirect()->route('decks.index', ['user' => auth()->user()]);
    }
}
