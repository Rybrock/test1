<?php

namespace Database\Factories;

use App\Models\Developer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Games>
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
            'game_name' => $this->faker->company(),
            'developer_id' => Developer::all()->random()->id,
            'email' => $this->faker->unique()->safeEmail(),
            'game_address' => $this->faker->address(),
            'game_location' => $this->faker->country(),
            'game_meta_score' => $this->faker->numberBetween(1, 30),
            'is_active' => $this->faker->boolean(),
            'first_published' => $this->faker->date(),
            'rating' => $this->faker->randomFloat(1, 0, 5)
        ];
    }
}
