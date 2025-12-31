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
        $tagCategories = ['Game','Project Management','UI/UX','Frontend','Backend',"Mobile"];

        return [
            'title' => fake()->company(),
            'description' => fake()->paragraph(2),
            'image' => fake()->image(),
            'tags'=> fake()->randomElements($tagCategories,2),
            'duration' => fake()->numberBetween(0,2),
            'link' => fake()->url()
        ];
    }
}
