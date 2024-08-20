<?php

namespace Database\Factories;

use App\Models\Developer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->company(),
            'release_date' => $this->faker->date(),
            'developer_team' => $this->faker->company(),
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'times_listed' => $this->faker->numberBetween(1, 1000),
            'number_of_reviews' => $this->faker->numberBetween(0, 500),
            'genres' => $this->faker->randomElements(['Action', 'Adventure', 'RPG', 'Strategy', 'Simulation'], $count = 2),
            'summary' => $this->faker->paragraph(),
            'reviews' => $this->faker->paragraphs(3, true),
            'developer_id' => Developer::all()->random()->id,
        ];
    }
}
