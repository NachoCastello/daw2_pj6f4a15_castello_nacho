<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $llista_professors = [
            [
                'nombre' => 'Nacho',
                'apellidos' => 'Castelló',
                'nif_cif' => '12345678A',
                'email' => 'nacho@clot.es',
                'telefono' => '600111222',
                'direccion' => 'Carrer València 1',
                'fecha_nacimiento' => '1990-01-01',
                'especialidad' => 'Desenvolupament',
                'anyos_experiencia' => 5,
                'categoria_profesional' => 'Titular',
                'sueldo' => 3000.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Anna',
                'apellidos' => 'Rovira',
                'nif_cif' => 'B55554444',
                'email' => 'anna@clot.es',
                'telefono' => '699000111',
                'direccion' => 'Carrer Balmes 15',
                'fecha_nacimiento' => '1991-06-18',
                'especialidad' => 'Xarxes',
                'anyos_experiencia' => 6,
                'categoria_profesional' => 'Titular',
                'sueldo' => 2900.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Marc',
                'apellidos' => 'García',
                'nif_cif' => '44332211K',
                'email' => 'marc@clot.es',
                'telefono' => '611222333',
                'direccion' => 'Gran Via 500',
                'fecha_nacimiento' => '1985-03-12',
                'especialidad' => 'Sistemes',
                'anyos_experiencia' => 12,
                'categoria_profesional' => 'Sènior',
                'sueldo' => 3500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Fem servir la taula 'principal' que hem definit al Model
        DB::table('principal')->insert($llista_professors);
    }
}
