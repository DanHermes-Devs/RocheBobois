<?php

namespace App\Exports;

use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use App\Models\HomeOffice;
use App\Models\SellerBest;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class ProductsExport implements FromCollection, WithCustomStartCell, WithHeadings, shouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Primero traemos todos los productos
        $products = Product::all();

        // Despues tramoes todas las categorias
        $categories = Category::all();

        // Despues traemos todos los home_offices
        $home_offices = HomeOffice::all();

        // Colecciones
        $colecciones = Collection::all();

        // Best Sellers
        $best_sellers = SellerBest::all();

        // Creamos un array vacio
        $productsArray = [];

        // Recorremos todos los productos
        foreach ($products as $product) {
            // Creamos un array vacio
            $productArray = [];

            // Agregamos los datos del producto al array
            $productArray['id'] = $product->id;
            // Recorremos todas las categorias
            foreach ($categories as $category) {
                // Si la categoria es null
                if ($product->category_id == 0 || $product->category_id == null) {
                    // Agregamos el valor null al array
                    $productArray['categoria'] = 'Sin categoria';
                } else {
                    // Si la categoria es igual a la categoria del producto
                    if ($category->id == $product->category_id) {
                        // Agregamos el nombre de la categoria al array
                        $productArray['categoria'] = $category->nombre;
                    }
                }
            }

            $productArray['nombre_producto'] = $product->nombre_producto;
            $productArray['descripcion'] = $product->descripcion;
            $productArray['precio'] = $product->precio;
            $productArray['precio_descuento'] = $product->precio_descuento;
            // Mostar en sales (Si o No)
            if ($product->mostrar_en_sales == 1) {
                $productArray['mostrar_en_sales'] = 'Si';
            } else {
                $productArray['mostrar_en_sales'] = 'No';
            }
            // Recorremos todos los Best Sellers
            foreach ($best_sellers as $best_seller) {
                // Si el best seller es null
                if ($product->best_seller == 0 || $product->best_seller == null) {
                    // Agregamos el valor null al array
                    $productArray['best_seller'] = 'No pertenece a Ningun Best Seller';
                } else {
                    // Si el best seller es igual al best seller del producto
                    if ($best_seller->id == $product->best_seller) {
                        // Agregamos el nombre del best seller al array
                        $productArray['best_seller'] = $best_seller->nombre;
                    }
                }
            }
            // Si la oportunidad unica es 0 es un no y si es 1 es un si
            if ($product->oportunidad_unica == 0) {
                $productArray['oportunidad_unica'] = 'No';
            } else {
                $productArray['oportunidad_unica'] = 'Si';
            }
            // Recorremos todos los home_offices
            foreach ($home_offices as $home_office) {
                // Si el home_office es null
                if ($product->home_office == 0 || $product->home_office == null) {
                    // Agregamos el valor null al array
                    $productArray['home_office'] = 'No pertenece a Ningun Home Office';
                } else {
                    // Si el home_office es igual al home_office del producto
                    if ($home_office->id == $product->home_office) {
                        // Agregamos el nombre del home_office al array
                        $productArray['home_office'] = $home_office->nombre;
                    }
                }
            }
            // Recorremos todas las colecciones
            foreach ($colecciones as $coleccion) {
                // Si la coleccion es null
                if ($product->coleccion_pertenece == 0 || $product->coleccion_pertenece == null) {
                    // Agregamos el valor null al array
                    $productArray['coleccion_pertenece'] = 'No pertenece a Ninguna Coleccion';
                } else {
                    // Si la coleccion es igual a la coleccion del producto
                    if ($coleccion->id == $product->coleccion_pertenece) {
                        // Agregamos el nombre de la coleccion al array
                        $productArray['coleccion_pertenece'] = $coleccion->nombre_coleccion;
                    }
                }
            }
            $productArray['imagen_destacada'] = $product->imagen_destacada;
            $productArray['galeria'] = $product->galeria;
            $productArray['slug'] = $product->slug;

            // Agregamos el array de datos del producto al array de productos
            $productsArray[] = $productArray;
        }

        // Retornamos el array de productos
        return collect($productsArray);
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function headings(): array
    {
        return [
            'ID',
            'Categoria',
            'Nombre',
            'Descripción',
            'Precio',
            'Precio Descuento',
            'Mostrar en Sales',
            'Best Seller',
            'Oportunidad Única',
            'Home Office',
            'Colección a la que pertenece',
            'Imagen Destacada',
            'Galería',
            'Slug',
        ];
    }
}