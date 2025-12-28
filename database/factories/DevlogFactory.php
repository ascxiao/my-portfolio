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
            'read_time'=>fake()->numberBetween(1,10),
            'content' => [
                'sections' => [
                    [
                        'type' => 'tldr',
                        'title' => 'This Week\'s Progress',
                        'color' => 'purple',
                        'items' => [
                            'Built combo attack system with 3-hit chains',
                            'Added hit-stop effect for better impact feel',
                            'Implemented damage numbers with floating animation',
                            'Fixed collision detection bug causing phantom hits'
                        ]
                    ],
                    [
                        'type' => 'markdown',
                        'content' => "## What I Worked On This Week\n\nThis week was all about making combat feel satisfying. I spent most of my time implementing the combo system and polishing the hit feedback."
                    ],
                    [
                        'type' => 'image',
                        'url' => 'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?w=1200',
                        'caption' => 'New combo system in action'
                    ],
                    [
                        'type' => 'markdown',
                        'content' => "### Combo Attack System\n\nPlayers can now chain up to 3 attacks together. Each attack in the combo deals progressively more damage and has different animations. The timing window is 0.5 seconds between attacks, which feels tight but fair.\n\n### Hit Feedback Improvements\n\nI added a brief pause (hit-stop) when attacks land, similar to what you see in fighting games. It's only 60ms but it makes hits feel way more impactful. Combined with screen shake and particle effects, combat finally feels crunchy."
                    ],
                    [
                        'type' => 'code',
                        'language' => 'csharp',
                        'content' => 'public void OnHit(Enemy target)\n{\n    target.TakeDamage(attackDamage * comboMultiplier);\n    StartCoroutine(HitStopEffect(0.06f));\n    SpawnDamageNumber(target.position, attackDamage);\n    \n    if (comboCount < maxCombo)\n    {\n        comboCount++;\n        ResetComboTimer();\n    }\n}'
                    ],
                    [
                        'type' => 'markdown',
                        'content' => "### Bug Fixes\n\nFixed a nasty collision detection bug where enemies would sometimes register hits even when the player's attack completely missed. Turns out I was checking collision on the wrong layer. Classic Unity mistake."
                    ],
                    [
                        'type' => 'two_column_grid',
                        'columns' => [
                            [
                                'title' => 'What Went Well',
                                'color' => 'green',
                                'items' => [
                                    'Hit-stop effect works perfectly',
                                    'Combo system feels responsive',
                                    'Damage numbers look clean'
                                ]
                            ],
                            [
                                'title' => 'Challenges',
                                'color' => 'orange',
                                'items' => [
                                    'Balancing combo timing windows',
                                    'Performance with many damage numbers',
                                    'Animation state transitions'
                                ]
                            ]
                        ]
                    ],
                    [
                        'type' => 'markdown',
                        'content' => "## Next Steps\n\nNext week I'm planning to add special attacks and enemy AI improvements. I also want to experiment with adding invincibility frames during dodge rolls.\n\nFeel free to leave feedback or suggestions in the comments!"
                    ]
                ]
            ]   
        ];
    }
}
