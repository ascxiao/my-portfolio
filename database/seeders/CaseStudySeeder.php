<?php

namespace Database\Seeders;

use App\Models\CaseStudy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaseStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CaseStudy::factory()->count(10)->create();
    }
}
