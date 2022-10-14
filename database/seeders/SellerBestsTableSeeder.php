<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SellerBestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('seller_bests')->delete();
        
        \DB::table('seller_bests')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Tapetes',
                'descripcion' => NULL,
                'imagen_destacada' => 'uploads/categorias-best-seller/tapetes/4QnNKYfiWrb8v5HkmPf2OsvndqNnCdlHkvwStHli.jpg',
                'slug' => 'tapetes',
                'created_at' => '2022-10-14 01:53:14',
                'updated_at' => '2022-10-14 01:53:14',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Textiles',
                'descripcion' => NULL,
                'imagen_destacada' => 'uploads/categorias-best-seller/textiles/O4XoWVb79n0jjcGBzSSe5iEJe6ti6zf1SnndkNsG.jpg',
                'slug' => 'textiles',
                'created_at' => '2022-10-14 01:53:39',
                'updated_at' => '2022-10-14 01:53:39',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Luminaria',
                'descripcion' => NULL,
                'imagen_destacada' => 'uploads/categorias-best-seller/luminaria/hrUgsPx9Iyk3A9Ko8nwKHee1Jv7XU80xC9XlHMCh.jpg',
                'slug' => 'luminaria',
                'created_at' => '2022-10-14 01:54:04',
                'updated_at' => '2022-10-14 01:54:04',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Decoración',
                'descripcion' => NULL,
                'imagen_destacada' => 'uploads/categorias-best-seller/decoracion/fOWGJhz1gv947fqUJxNcit49iQbtx6uMbhvRs75k.jpg',
                'slug' => 'decoracion',
                'created_at' => '2022-10-14 01:54:27',
                'updated_at' => '2022-10-14 01:54:27',
            ),
        ));
        
        
    }
}