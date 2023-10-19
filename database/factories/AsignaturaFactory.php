<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asignatura>
 */
class AsignaturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->text(),
            'creditos' => $this->faker->numberBetween(2, 6),
            'area_de_conocimiento' => $this->faker->randomElement(['Matemáticas', 'Ciencias Naturales', 'Historia', 'Lenguaje', 'Programacion']),
            'obligatoria' => $this->faker->boolean(),
        ];
    }
}
