<?php

namespace Database\Seeders;

use App\Models\Chair;
use App\Models\Fac;
use App\Models\Prof;
use App\Models\Student;
use Database\Factories\ChairFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chair::factory()->count(10)
            ->has(Student::factory()->count(random_int(20, 200)))
            ->create();
    }
}
