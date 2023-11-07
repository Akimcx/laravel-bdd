<?php

namespace Database\Factories;

use App\Models\Chair;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        /** @var string[] */
        $presence = ["Présent", "Non Présent"];
        return [
            "last_name" => $this->faker->lastName,
            "first_name" => $this->faker->firstName,
            "presence" => $this->faker->randomElement($presence),
            "chair_id" => Chair::factory(),
        ];
    }
}
