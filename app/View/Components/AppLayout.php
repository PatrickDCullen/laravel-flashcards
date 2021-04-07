<?php

namespace App\View\Components;

use App\Models\Deck;
use App\Models\User;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public $user;
    public $deck;

    public function __construct(User $user, Deck $deck)
    {
        $this->user = $user;
        $this->deck = $deck;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
