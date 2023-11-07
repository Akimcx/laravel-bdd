<?php

namespace Database\Factories;

use App\Models\Fac;
use App\Models\Prof;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chair>
 */
class ChairFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $vacation = ["AM", "PM"];
        return [
            "fac_id" => $this->faker->numberBetween(1, 3),
            "prof_id" => Prof::factory(),
            "vacation" => $this->faker->randomElement($vacation),
            "dates" => $this->faker->dateTimeBetween("-3 years"),
        ];
    }
}
