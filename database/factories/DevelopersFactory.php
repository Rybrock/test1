<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Developers>
 */
class DevelopersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'developer name' => fake()->company(),
            'developer email' => fake()->companyEmail(),
            'developer address' => fake()->address(),
            'developer location' => fake()->country()
        ];
    }
}
