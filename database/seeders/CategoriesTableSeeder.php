<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Comedores',
                'slug' => 'comedores',
                'imagen_destacada' => NULL,
                'created_at' => '2022-10-14 01:08:29',
                'updated_at' => '2022-10-14 01:08:29',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Decoración',
                'slug' => 'decoracion',
                'imagen_destacada' => NULL,
                'created_at' => '2022-10-14 01:08:35',
                'updated_at' => '2022-10-14 01:08:35',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Escritorios',
                'slug' => 'escritorios',
                'imagen_destacada' => NULL,
                'created_at' => '2022-10-14 01:08:40',
                'updated_at' => '2022-10-14 01:08:40',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Libreros',
                'slug' => 'libreros',
                'imagen_destacada' => NULL,
                'created_at' => '2022-10-14 01:08:46',
                'updated_at' => '2022-10-14 01:08:46',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Luminaria',
                'slug' => 'luminaria',
                'imagen_destacada' => NULL,
                'created_at' => '2022-10-14 01:08:53',
                'updated_at' => '2022-10-14 01:08:53',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Pouf',
                'slug' => 'pouf',
                'imagen_destacada' => NULL,
                'created_at' => '2022-10-14 01:09:00',
                'updated_at' => '2022-10-14 01:09:00',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Recámaras',
                'slug' => 'recamaras',
                'imagen_destacada' => NULL,
                'created_at' => '2022-10-14 01:09:04',
                'updated_at' => '2022-10-14 01:09:04',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Salas',
                'slug' => 'salas',
                'imagen_destacada' => NULL,
                'created_at' => '2022-10-14 01:09:09',
                'updated_at' => '2022-10-14 01:09:09',
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Sillones',
                'slug' => 'sillones',
                'imagen_destacada' => NULL,
                'created_at' => '2022-10-14 01:09:14',
                'updated_at' => '2022-10-14 01:09:14',
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Tapetes',
                'slug' => 'tapetes',
                'imagen_destacada' => NULL,
                'created_at' => '2022-10-14 01:09:20',
                'updated_at' => '2022-10-14 01:09:20',
            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => 'Textiles',
                'slug' => 'textiles',
                'imagen_destacada' => NULL,
                'created_at' => '2022-10-14 01:09:25',
                'updated_at' => '2022-10-14 01:09:25',
            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => 'Sillas',
                'slug' => 'sillas',
                'imagen_destacada' => NULL,
                'created_at' => '2022-10-14 04:05:36',
                'updated_at' => '2022-10-14 04:05:36',
            ),
            12 => 
            array (
                'id' => 13,
                'nombre' => 'Mesas de Centro',
                'slug' => 'mesas-de-centro',
                'imagen_destacada' => NULL,
                'created_at' => '2022-10-14 04:07:18',
                'updated_at' => '2022-10-14 04:07:18',
            ),
        ));
        
        
    }
}