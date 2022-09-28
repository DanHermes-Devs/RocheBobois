<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = [
        'nombre_producto',
        'descripcion',
        'descripcion_corta',
        'precio',
        'precio_descuento',
        'mostrar_en_sales',
        'imagen_destacada',
        'galeria',
        'slug',
        'subcategory_id'
    ];

    // Relacionar con subcategories (1 a muchos inversa)
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    // Relacionar con categories (1 a muchos inversa)
    public function category(){
        return $this->belongsToThrough(Category::class, Subcategory::class);
    }

    // Relacionar con images (1 a muchos polimorfica)
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}
