<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sliders')->delete();
        
        \DB::table('sliders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre_disenador' => 'Eugeni Quitllet',
                'nombre_producto' => 'PULP',
                'imagen_destacada' => 'uploads/slider/eugeni-quitllet/ndkklGS8flHc0KT75PAMRmh8vsws2TkAbV1540Hz.jpg',
                'slug' => 'eugeni-quitllet',
                'created_at' => '2022-09-30 02:13:57',
                'updated_at' => '2022-09-30 02:13:57',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre_disenador' => 'Philippe Bouix',
                'nombre_producto' => 'SYNTONE',
                'imagen_destacada' => 'uploads/slider/philippe-bouix/6Q0HNkmeu7Q94JqFToLqCx9ck0PwBDxSyGdvSyLH.jpg',
                'slug' => 'philippe-bouix',
                'created_at' => '2022-09-30 02:14:44',
                'updated_at' => '2022-09-30 02:14:44',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre_disenador' => 'Fabrice Berrux',
                'nombre_producto' => 'AQUA',
                'imagen_destacada' => 'uploads/slider/fabrice-berrux/ueNeTMfR8w1rci2cV88MxAcYI7XFWVtiWs6IgSW6.jpg',
                'slug' => 'fabrice-berrux',
                'created_at' => '2022-09-30 02:15:18',
                'updated_at' => '2022-09-30 02:15:18',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre_disenador' => 'Sacha Lakic',
                'nombre_producto' => 'DOMINO',
                'imagen_destacada' => 'uploads/slider/sacha-lakic/fDQc6XjQ6xUkEihQr7o2AUQIaLhFWjY4vPAJ48uJ.jpg',
                'slug' => 'sacha-lakic',
                'created_at' => '2022-09-30 02:15:45',
                'updated_at' => '2022-09-30 02:15:45',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre_disenador' => 'Sacha Lakic',
                'nombre_producto' => 'EDEN ROCK',
                'imagen_destacada' => 'uploads/slider/sacha-lakic/PrvKKDdVjxAA3zmmIRtYFKuIS5u1wwZsEYsFkHdg.jpg',
                'slug' => 'sacha-lakic',
                'created_at' => '2022-09-30 02:16:23',
                'updated_at' => '2022-09-30 02:16:23',
            ),
        ));
        
        
    }
}