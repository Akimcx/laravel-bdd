<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fac>
 */
class FacFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sigles = [["FDSE", "Faculté De Droit Et Des Sciences Économiques"], ["IERAH", "Institut d'Étude et de Recherche Africaine d'Haïti"], ["INAGHEI", "Institut National d'Administration, de Gestion et des Hautes Études Internationales"]];
        $index = $this->faker->randomElement($sigles);
        return [
            "sigle" => $index[0],
            "name" => $index[1],
        ];
    }
}
