<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeOffice extends Model
{
    use HasFactory;

    protected $table = 'home_offices';

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen_destacada',
        'slug'
    ];
}
