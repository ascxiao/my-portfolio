<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CaseStudy>
 */
class CaseStudyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $metricNames = ['Users', 'Sessions', 'Revenue', 'Signups', 'Retention', 'DAU', 'NPS'];
        $quantifiers = ['%', 'x'];
            $tagCategories = ['Game','Project Management','UI/UX','Frontend','Backend', "Mobile"];

        $metrics = collect(range(1, 3))->map(function () use ($metricNames, $quantifiers) {
            return [
                'metrics' => fake()->randomElement($metricNames),
                'quantifier' => fake()->numberBetween(5, 500) . fake()->randomElement($quantifiers),
            ];
        })->all();

        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->realtext(30),
            'creation_date' => fake()->dateTime(),
            'image' => fake()->image(),
            'tags'=> fake()->randomElements($tagCategories, 2),
            'duration' => fake()->numberBetween(0,10),
            'content'=>fake()->realText(500),
            // structured metrics array (not a faker call)
            'metrics'=> $metrics,
        ];
    }
}
