<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VillageFund>
 */
class VillageFundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $transactionType = fake()->randomElement(['in', 'out']);

        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraphs(2, true),
            'amount' => fake()->randomFloat(2, 500000, 25000000),
            'transaction_type' => $transactionType,
            'is_draft' => fake()->boolean(25),
            'admin_id' => fake()->numberBetween(1, 2),
        ];
    }
}
