<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function store(Request $request, User $user)
    {
        $request->validate([
            'topic' => 'required'
        ]);

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

    public function update(Request $request, User $user, Deck $deck)
    {
        // validate the request
        $request->validate([
            'topic' => 'required'
        ]);
        // update the deck model
        $deck = Deck::find($deck->id);
        $deck->topic = $request['topic'];
        $deck->save();
        // flash what you updated to the edit view

        // redirect to the edit view? Or in this case does it make more sense to redirect to the deck show view?
        // how does this effect flashing to the session? You now have to put it on the show view for display.
        return redirect()->route('decks.show', ['user' => $user, 'deck' => $deck]);
    }

    public function destroy(User $user, Deck $deck)
    {
        // destroy the deck... what does this entail?
        Deck::destroy($deck->id);

        return redirect()->route('decks.index', ['user' => $user]);
    }
}
