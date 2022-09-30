<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('event_categories')->delete();
        
        \DB::table('event_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Arte y Cultura',
                'imagen_destacada' => 'uploads/categorias-eventos/arte-y-cultura/OLI3eHrgq9YNxxoENP7FgG8x6YrpAsjeCqBf3LAD.jpg',
                'slug' => 'arte-y-cultura',
                'created_at' => '2022-09-30 04:25:16',
                'updated_at' => '2022-09-30 04:25:16',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Deportivos',
                'imagen_destacada' => 'uploads/categorias-eventos/deportivos/F0vsUlM4hVGha3bYffRP8yzKMj9eu7KqIAnhf7BC.png',
                'slug' => 'deportivos',
                'created_at' => '2022-09-30 04:25:47',
                'updated_at' => '2022-09-30 04:25:47',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Estilo de Vida',
                'imagen_destacada' => 'uploads/categorias-eventos/estilo-de-vida/R9Gzx07WbL3jLkxugIHaC9Wy3RctuC24kcerTmsV.jpg',
                'slug' => 'estilo-de-vida',
                'created_at' => '2022-09-30 04:26:26',
                'updated_at' => '2022-09-30 04:26:26',
            ),
        ));
        
        
    }
}