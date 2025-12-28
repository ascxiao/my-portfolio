<?php

namespace Database\Seeders;

use App\Models\Devlog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Devlog::factory()->count(20)->create();
    }
}
