<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuarisAmbRolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $llista_usuaris = [
            [
                'name' => 'leniad',
                'role' => 'gestor',
                'email' => 'leinad@fjeclot.net',
                'password' => Hash::make('fjeClot26#')
            ],
            [
                'name' => 'aletse',
                'role' => 'consultor',
                'email' => 'aletse@fjeclot.net',
                'password' => Hash::make('clotFje26@')
            ],
            [
                'name' => 'igres',
                'role' => 'consultor',
                'email' => 'igres@fjeclot.net',
                'password' => Hash::make('Clotfje26@')
            ],
        ];
        DB::table('users')->insert($llista_usuaris);
    }
}
