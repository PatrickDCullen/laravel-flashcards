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
}
