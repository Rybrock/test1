<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Games>
 */
class GamesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'game_name' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'game_address' => $this->faker->address(),
            'game_location' => $this->faker->country(),
            'game_experience' => $this->faker->numberBetween(1, 30),
            'is_active' => $this->faker->boolean(),
            'joined_date' => $this->faker->date(),
            'rating' => $this->faker->randomFloat(1, 0, 5)
        ];
    }
}
