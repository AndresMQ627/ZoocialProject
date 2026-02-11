<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('animalitos')->insert([
    [
        'id_animalito' => 1,
        'id_responsable' => 1,
        'id_raza' => 1,
        'nombre' => 'Max',
        'edad_estimado' => '2 años',
        'genero' => 'Macho',
        'disponibilidad' => 'Disponible',
        'fecha_ingreso' => now()
    ],
    [
        'id_animalito' => 2,
        'id_responsable' => 1,
        'id_raza' => 2,
        'nombre' => 'Luna',
        'edad_estimado' => '1 año',
        'genero' => 'Hembra',
        'disponibilidad' => 'Disponible',
        'fecha_ingreso' => now()
    ]
]);

    }
}
