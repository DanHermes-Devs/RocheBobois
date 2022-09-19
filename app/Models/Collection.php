<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $table = 'collections';
    protected $fillable = [
        'nombre_disenador',
        'descripcion',
        'imagen_destacada',
        'nombre_coleccion',
        'foto_disenador',
        'imagen_1',
        'imagen_2',
        'imagen_3',
        'slug',
    ];
}
