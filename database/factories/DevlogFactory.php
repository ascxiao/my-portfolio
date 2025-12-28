<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Devlog>
 */
class DevlogFactory extends Factory
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
            'title' => fake()->firstName(),
            'description' => fake()->realText(30),
            'image' => fake()->image(),
            'creation_date' => fake()->dateTime(),
            'tags'=> fake()->randomElements($tagCategories, 3),
            'content' => fake()->realText(500)
        ];
    }
}
