<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = "events";
    protected $fillable = [
        'nombre_evento',
        'categoria',
        'descripcion',
        'fecha',
        'hora',
        'imagen_destacada',
        'categoria_id',
    ];
}
