<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Professor extends Model
{
    use HasFactory;
    protected $table = 'principal';

    protected $fillable = [
        'nombre',
        'apellidos',
        'nif_cif',
        'email',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'especialidad',
        'anyos_experiencia',
        'categoria_profesional',
        'sueldo'
    ];
}
