<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('instructors')->insert([
            'first_name' => "Steef Carlens",
            'last_name' => "Theralus",
        ]);
        DB::table('instructors')->insert([
            'first_name' => "Yvon",
            'last_name' => "Oreste",
        ]);
        DB::table('instructors')->insert([
            'first_name' => "Jean Dimitri",
            'last_name' => "Dorvilier",
        ]);
        DB::table('instructors')->insert([
            'first_name' => "Bernard",
            'last_name' => "Richard",
        ]);
        DB::table('instructors')->insert([
            'first_name' => "Jehufendy",
            'last_name' => "Joseph",
        ]);
        DB::table('instructors')->insert([
            'first_name' => "Hassley",
            'last_name' => "Adras",
        ]);
        DB::table('instructors')->insert([
            'first_name' => "David",
            'last_name' => "Joliné",
        ]);
        DB::table('instructors')->insert([
            'first_name' => "Monzy",
            'last_name' => "Fayette",
        ]);
        DB::table('instructors')->insert([
            'first_name' => "Roberson",
            'last_name' => "Dorlus",
        ]);
    }
}
