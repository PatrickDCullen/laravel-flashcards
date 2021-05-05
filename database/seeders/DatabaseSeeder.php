<?php

namespace Database\Seeders;

use App\Models\Deck;
use App\Models\User;
use App\Models\Flashcard;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(10)
            ->has(Deck::factory()
                ->has(Flashcard::factory()->count(10))
            ->count(10))
            ->create();
    }

}
