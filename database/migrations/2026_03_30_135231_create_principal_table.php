<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('principal', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('nif_cif', 12)->unique();
            $table->string('email');
            $table->string('telefono');
            $table->string('direccion');
            $table->date('fecha_nacimiento');
            $table->enum('especialidad', ['Sistemes', 'Desenvolupament', 'Xarxes', 'IA', 'Ciberseguretat']);
            $table->integer('anyos_experiencia');
            $table->string('categoria_profesional');
            $table->float('sueldo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('principal');
    }
};
