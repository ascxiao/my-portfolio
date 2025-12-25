<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->firstName(),
            'description' => fake()->realText(30),
            'image' => fake()->image(),
            'tags' => fake()->words(3),
            'duration' => fake()->numberBetween(0,2),
            'link' => fake()->url()
        ];
    }
}
