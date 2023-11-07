<?php

namespace Database\Seeders;

use App\Models\Fac;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('facs')->insert([
            'name' => 'Faculté De Droit Et Des Sciences Économiques',
            'sigle' => 'FDSE',
        ]);
        DB::table('facs')->insert([
            'name' => "Institut d'Étude et de Recherche Africaine d'Haïti",
            'sigle' => 'IERAH',
        ]);
        DB::table('facs')->insert([
            'name' => "Institut National d'Administration, de Gestion et des Hautes Études Internationales",
            'sigle' => 'INAGHEI',
        ]);
    }
}
