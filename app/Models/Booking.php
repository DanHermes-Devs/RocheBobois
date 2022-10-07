<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'id_user',
        'id_event',
        'nombre_evento',
        'nombre_usuario',
        'email_usuario',
        'telefono_usuario',
        'hora',
        'fecha',
        'codigo_reserva',
        'status'
    ];
}
