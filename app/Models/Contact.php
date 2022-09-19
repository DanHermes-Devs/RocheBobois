<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = "contacts";
    protected $fillable = [
        'mensaje_pleca',
        'nombre_completo',
        'correo_electronico',
        'telefono',
        'sucursal',
        'productos_interesado',
        'newsletter',
    ];
}
