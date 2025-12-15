<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HealthInformation>
 */
class HealthInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement([
                'Posyandu Balita Bulanan',
                'Pemeriksaan Kesehatan Gratis',
                'Edukasi Gizi Seimbang',
                'Vaksinasi Lansia',
                'Senam Sehat Bersama',
            ]),
            'description' => fake()->paragraphs(2, true),
            'event_date' => fake()->dateTimeBetween('-1 month', '+2 months')->format('Y-m-d'),
            'location' => fake()->randomElement([
                'Balai Desa Pandawa',
                'Puskesmas Pandawa',
                'Lapangan Utama Desa',
                'Gedung Serbaguna',
            ]),
            'is_draft' => fake()->boolean(20),
            'author_id' => fake()->numberBetween(1, 2),
        ];
    }
}
