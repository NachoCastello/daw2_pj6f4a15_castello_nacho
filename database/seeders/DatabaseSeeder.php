<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsuarisAmbRolsSeeder::class,
            ProfessorSeeder::class,
	   ProfessorRandom::class,
        ]);
    }
}
