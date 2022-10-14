<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'category_id' => $row[0],
            'subcategory_id' => $row[1],
            'nombre_producto' => $row[2],
            'descripcion' => $row[3],
            'precio' => $row[4],
            'precio_descuento' => $row[5], 
            'mostrar_en_sales' => $row[6],
            'best_seller' => $row[7],
            'oportunidad_unica' => $row[8],
            'home_office' => $row[9],
            'coleccion_pertenece' => $row[10],
            'imagen_destacada' => $row[11],
            'galeria' => $row[12],
            'slug' => $row[13],
        ]);
    }
}
