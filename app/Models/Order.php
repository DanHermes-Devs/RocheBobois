<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'total',
        'nombre_completo',
        'email',
        'telefono',
        'direccion_principal',
        'direccion_opcional',
        'pais',
        'estado',
        'codigo_postal',
        'informacion_adicional',
        'payment_type',
        'payment_method',
        'payment_id',
        'transaction_id',
        'currency',
        'order_no',
        'order_date',
        'invoice_no',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

}
