<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VillagePotential>
 */
class VillagePotentialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company() . ' ' . fake()->randomElement(['Farm', 'Agro', 'Craft', 'Tour']),
            'address' => fake()->address(),
            'email' => fake()->boolean(80) ? fake()->companyEmail() : null,
            'phone' => fake()->boolean(80) ? fake()->phoneNumber() : null,
            'description' => fake()->paragraphs(3, true),
            'is_draft' => fake()->boolean(30),
            'author_id' => fake()->numberBetween(1, 2),
        ];
    }
}
