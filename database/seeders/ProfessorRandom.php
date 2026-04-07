<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Professor;

class ProfessorRandom extends Seeder
{
    public function run(): void
    {
        Professor::factory()->count(10)->create();
    }
}
