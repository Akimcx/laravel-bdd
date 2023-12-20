<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schools')->insert([
            'name' => 'Faculté De Droit Et Des Sciences Économiques',
            'sigle' => 'FDSE',
        ]);
        DB::table('schools')->insert([
            'name' => "Institut d'Étude et de Recherche Africaine d'Haïti",
            'sigle' => 'IERAH',
        ]);
        DB::table('schools')->insert([
            'name' => "Institut National d'Administration, de Gestion et des Hautes Études Internationales",
            'sigle' => 'INAGHEI',
        ]);
        DB::table('schools')->insert([
            'name' => "Campus Henry CHRISTOPHE de Limonade",
            'sigle' => 'CHCL',
        ]);
        DB::table('schools')->insert([
            'name' => "Faculté de Droit des Sciences Economiques et de Gestion",
            'sigle' => 'FDSEG',
        ]);
        DB::table('schools')->insert([
            'name' => "Faculté d'Agronomie et de Médecine Vétérinaire",
            'sigle' => 'FAMV',
        ]);
        DB::table('schools')->insert([
            'name' => "Université Publique du Sud : Faculté des Sciences Juridiques",
            'sigle' => 'UPS/FSJ',
        ]);
    }
}
