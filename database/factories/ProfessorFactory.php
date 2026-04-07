<?php

namespace Database\Factories;

use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorFactory extends Factory
{
    protected $model = Professor::class;

    public function definition(): array
    {
        return [
            'nombre'               => fake()->firstName(),
            'apellidos'            => fake()->lastName() . ' ' . fake()->lastName(),
            'nif_cif'              => strtoupper(fake()->bothify('########?')), 
            'email'                => fake()->unique()->safeEmail(),
            'telefono'             => (string)fake()->numberBetween(600000000, 799999999),
            'direccion'            => fake()->address(),
            'fecha_nacimiento'     => fake()->date('Y-m-d', '-25 years'),
            'especialidad'         => fake()->randomElement(['Sistemes', 'Desenvolupament', 'Xarxes', 'IA', 'Ciberseguretat']),
            'anyos_experiencia'    => fake()->numberBetween(1, 30),
            'categoria_profesional' => fake()->randomElement(['Junior', 'Titular', 'Senior', 'Especialista']),
            'sueldo'               => fake()->randomFloat(2, 1800, 4500),
        ];
    }
}
