<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certification>
 */
class CertificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->company(),
            'provider' => fake()->company(),
            'description' => fake()->paragraph(2),
            'image' => fake()->image(),
            'acquired_date' => fake()->dateTime(),
            'link' => fake()->url()
        ];
    }
}
