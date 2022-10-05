<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BuildingCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('building_categories')->delete();
        
        \DB::table('building_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Boutique',
                'imagen_destacada' => 'uploads/categorias-buildings/boutique/wGVXrdrbBHsPrPf4yuDyzp9kxL0t0LdwdvAb2Bxu.jpg',
                'slug' => 'boutique',
                'created_at' => '2022-10-04 12:20:12',
                'updated_at' => '2022-10-04 12:20:12',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Hoteles',
                'imagen_destacada' => 'uploads/categorias-buildings/hoteles/gU9KB1KYxFtmHfzxVnt7KJ8HvCtFhIjDKChSp9vm.jpg',
                'slug' => 'hoteles',
                'created_at' => '2022-10-04 12:20:46',
                'updated_at' => '2022-10-04 12:20:46',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Lifestyle',
                'imagen_destacada' => 'uploads/categorias-buildings/lifestyle/Lpf8tWiUWjDLHPmEovqOcVM1xmNR2Eyh7Mn7iD4p.jpg',
                'slug' => 'lifestyle',
                'created_at' => '2022-10-04 12:21:25',
                'updated_at' => '2022-10-04 12:21:25',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Residencial',
                'imagen_destacada' => 'uploads/categorias-buildings/residencial/bvX6gOfPocjXqPQRcodZNzgFuOogFrGmuHVmbor6.jpg',
                'slug' => 'residencial',
                'created_at' => '2022-10-04 12:21:50',
                'updated_at' => '2022-10-04 12:21:50',
            ),
        ));
        
        
    }
}