<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    protected $table = 'buildings';
    protected $fillable = [
        'nombre_hotel',
        'descripcion',
        'categoria',
        'imagen_destacada'
    ];
}
