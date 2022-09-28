<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = [
        'nombre', 
        'slug', 
        'imagen_destacada',
        'category_id'
    ];

    // Relacionar con products (1 a muchos)
    public function products(){
        return $this->hasMany(Product::class);
    }

    // Relacionar con categories (1 a muchos inversa)
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
