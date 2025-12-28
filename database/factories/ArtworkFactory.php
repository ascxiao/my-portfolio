<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artwork>
 */
class ArtworkFactory extends Factory
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
            'source'=>fake()->url(),
            'title'=>fake()->lastName(),
            'creation_date'=>fake()->dateTime(),
            'tags'=> fake()->randomElements($tagCategories, 3),
        ];
    }
}
