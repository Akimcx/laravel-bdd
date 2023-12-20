<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\School;
use App\Models\User;
use Database\Factories\InstructorFactory;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SchoolSeeder::class,
            InstructorSeeder::class,
            CourseSeeder::class,
        ]);
        User::factory()->create();
        // $profs = Instructor::all();
        // $schools = School::all();
        // foreach ($schools as $key => $school) {
        //     $school->instructors()->attach($profs[$key]);
        // }
        // $courses = Course::all();
        // foreach ($courses as $key => $course) {
        //     $course->schools()->attach($schools[$key]);
        //     $course->instructors()->attach($profs[$key]);
        // }
        // Instructor::factory(5)->create();
        // School::factory()->create();
        // Course::factory(5)
        // ->has(Instructor::factory()->count(3))->create();
        // Instructor::factory(5)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
