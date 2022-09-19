<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showroom extends Model
{
    use HasFactory;
    protected $table = 'showrooms';
    protected $fillable = [
        'nombre_showroom',
        'ciudad_showroom',
        'numero_whatsapp',
        'mensaje_predeterminado_wp',
        'numero_llamadas',
        'iframe_google_maps',
        'direccion_showroom',
        'como_llegar',
        'id_tag_manager',
        'imagen_destacada'
    ];
}
