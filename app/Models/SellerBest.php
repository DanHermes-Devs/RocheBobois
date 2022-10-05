<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerBest extends Model
{
    use HasFactory;

    protected $table = 'seller_bests';

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen_destacada',
        'slug',
    ];
}
