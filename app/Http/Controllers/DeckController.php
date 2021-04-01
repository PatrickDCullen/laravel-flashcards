<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\User;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    public function index()
    {
        return view('decks.index');
    }

    public function create()
    {
        return view('decks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required'
        ]);

        Deck::create([
            'topic' => $request['topic'],
            'user_id' => auth()->id()
        ]);

        $request->session()->flash('topic', $request['topic']);

        return redirect()->route('decks.create', [auth()->id()]);
    }
}
