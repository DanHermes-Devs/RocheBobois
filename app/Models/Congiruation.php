<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Congiruation extends Model
{
    use HasFactory;

    protected $table = 'congiruations';

    protected $fillable = [
        'aviso_privacidad',
        'terminos_condiciones'
    ];
}
