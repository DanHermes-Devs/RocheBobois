<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HomeOfficesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('home_offices')->delete();
        
        \DB::table('home_offices')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Sillas',
                'descripcion' => NULL,
                'imagen_destacada' => 'uploads/categorias-home-office/sillas/LS9NuuvRkW057LVQ6bUiOa8JReuOSwoJ9iASUspa.jpg',
                'slug' => 'sillas',
                'created_at' => '2022-10-14 03:48:36',
                'updated_at' => '2022-10-14 03:48:36',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Escritorios',
                'descripcion' => NULL,
                'imagen_destacada' => 'uploads/categorias-home-office/escritorios/CBmMMJpfDXfkll5tX8zw4SjZED9meb85xs9bzaVm.jpg',
                'slug' => 'escritorios',
                'created_at' => '2022-10-14 03:49:02',
                'updated_at' => '2022-10-14 03:49:02',
            ),
        ));
        
        
    }
}