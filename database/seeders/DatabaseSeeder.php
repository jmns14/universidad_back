<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Asignatura;
use App\Models\Estudiante;
use App\Models\Profesor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Estudiante::factory()->times(15)->create();
        Profesor::factory()->times(10)->create();
        Asignatura::factory()->times(8)->create()->each(function ($asignatura) {
            $asignatura->profesores()->sync(
                Profesor::all()->random(4)
            );
            $asignatura->estudiantes()->sync(
                Estudiante::all()->random(3)
            );
        });
    }
}
