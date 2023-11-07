<?php

namespace Database\Seeders;

use App\Models\Prof;
use Database\Factories\ProfFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prof::factory()->count(1000)->create();
    }
}
