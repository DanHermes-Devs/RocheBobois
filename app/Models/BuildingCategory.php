<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingCategory extends Model
{
    use HasFactory;

    protected $table = 'building_categories';

    protected $fillable = [
        'nombre',
        'imagen_destacada',
        'slug'
    ];
}
