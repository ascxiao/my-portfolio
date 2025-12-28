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
            'content' => [
                'sections' => [
                    [
                        'type' => 'markdown',
                        'content' => "## Research & Discovery\n\nWe conducted comprehensive user research including 25 user interviews, session recordings analysis, and competitive benchmarking."
                    ],
                    [
                        'type' => 'two_column_grid',
                        'columns' => [
                            [
                                'title' => 'Pain Points',
                                'color' => 'red',
                                'items' => [
                                    'Too many form fields required',
                                    'Unclear shipping costs until final step',
                                    'Limited payment options',
                                    'No guest checkout option'
                                ]
                            ],
                            [
                                'title' => 'Opportunities',
                                'color' => 'green',
                                'items' => [
                                    'Simplify to essential fields only',
                                    'Show all costs upfront',
                                    'Add popular payment methods',
                                    'Enable guest checkout'
                                ]
                            ]
                        ]
                    ],
                    [
                        'type' => 'numbered_steps',
                        'title' => 'Design Process',
                        'description' => 'We followed an iterative design process, creating multiple prototypes and conducting usability testing at each stage.',
                        'steps' => [
                            [
                                'title' => 'Wireframing & Information Architecture',
                                'description' => 'Restructured the checkout flow from 7 steps to 3, consolidating related information.',
                                'color' => 'blue'
                            ],
                            [
                                'title' => 'Visual Design & Prototyping',
                                'description' => 'Created high-fidelity prototypes with clear visual hierarchy and trust indicators.',
                                'color' => 'purple'
                            ],
                            [
                                'title' => 'Testing & Iteration',
                                'description' => 'Conducted 3 rounds of usability testing with 15 participants each.',
                                'color' => 'indigo'
                            ]
                        ]
                    ],
                    [
                        'type' => 'image',
                        'url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200',
                        'caption' => 'Streamlined checkout flow with clear progress indicators'
                    ],
                    [
                        'type' => 'image_grid',
                        'images' => [
                            [
                                'url' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?w=600',
                                'caption' => 'Mobile-optimized experience'
                            ],
                            [
                                'url' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600',
                                'caption' => 'Multiple payment options'
                            ]
                        ]
                    ],
                    [
                        'type' => 'feature_cards',
                        'title' => 'Key Features',
                        'features' => [
                            [
                                'title' => 'Guest Checkout',
                                'description' => 'Removed mandatory account creation, allowing users to complete purchases without registration.',
                                'color' => 'blue',
                                'icon' => '<svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
                            ],
                            [
                                'title' => 'Multiple Payment Options',
                                'description' => 'Added Apple Pay, Google Pay, and buy-now-pay-later options alongside traditional methods.',
                                'color' => 'purple',
                                'icon' => '<svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>'
                            ],
                            [
                                'title' => 'Order Summary Always Visible',
                                'description' => 'Persistent order summary with real-time cost updates throughout the checkout process.',
                                'color' => 'green',
                                'icon' => '<svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>'
                            ],
                            [
                                'title' => 'Trust Signals',
                                'description' => 'Added security badges, SSL indicators, and money-back guarantee messaging.',
                                'color' => 'orange',
                                'icon' => '<svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>'
                            ]
                        ]
                    ],
                    [
                        'type' => 'impact_section',
                        'title' => 'Impact & Results',
                        'description' => 'The redesigned checkout experience launched in Q2 2024 and immediately showed positive results.',
                        'subsection_title' => 'Business Impact',
                        'from_color' => 'green',
                        'to_color' => 'blue',
                        'items' => [
                            'Generated an additional $2.4M in revenue in the first quarter',
                            'Reduced support tickets related to checkout by 28%',
                            'Improved customer lifetime value by 15%'
                        ]
                    ],
                    [
                        'type' => 'markdown',
                        'content' => "## Key Learnings\n\nThis project reinforced the importance of user research and iterative testing. The biggest learning was that trust-building elements matter just as much as functional improvements."
                    ]
                ]
                    ],
            'metrics'=> $metrics,
            'role' =>fake()->jobTitle(),
            'team' => fake()->numberBetween(1, 10),
        ];
    }
}
