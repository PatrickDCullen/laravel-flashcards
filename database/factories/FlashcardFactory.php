<?php

namespace Database\Factories;

use App\Models\Deck;
use App\Models\Flashcard;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlashcardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Flashcard::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'deck_id' => Deck::factory(),
            'term' => $this->faker->word(),
            'definition' => $this->faker->sentence(),
        ];
    }
}
