<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'nombre_producto',
        'descripcion',
        'descripcion_corta',
        'precio',
        'mostrar_en_sales',
        'coleccion_pertenece',
        'imagen_destacada',
        'imagen_1',
        'imagen_2',
        'imagen_3',
        'imagen_4',
        'imagen_5',
        'imagen_6'
    ];
}
