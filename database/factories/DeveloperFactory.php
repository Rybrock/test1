<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Developers>
 */
class DeveloperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'developer_name' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'developer_address' => $this->faker->address(),
            'developer_location' => $this->faker->country(),
            'developer_meta_score' => $this->faker->numberBetween(1, 30),
            'is_active' => $this->faker->boolean(),
            'first_published_game' => $this->faker->date(),
            'rating' => $this->faker->randomFloat(1, 0, 5)
        ];
    }
}
