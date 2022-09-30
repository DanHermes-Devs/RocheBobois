<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShowroomsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('showrooms')->delete();
        
        \DB::table('showrooms')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre_showroom' => 'MONTERREY',
                'ciudad_showroom' => 'Monterrey',
                'numero_whatsapp' => '528117881815',
                'mensaje_predeterminado_wp' => 'Hola, Necesito información sobre Roche Bobois',
                'numero_llamadas' => '528117881815',
                'iframe_google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3596.439997321771!2d-100.36899388498122!3d25.656705283684552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x91013fdc46c35c2a!2zMjXCsDM5JzI0LjEiTiAxMDDCsDIyJzAwLjUiVw!5e0!3m2!1ses!2smx!4v1652937777779!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'direccion_showroom' => 'Genaro Garza García 113, Valle Oriente, 66220 San Pedro Garza García, N.L.',
                'como_llegar' => 'https://www.google.com/maps/?q=25.6567053,-100.36680519999999',
                'id_tag_manager' => 'monterrey',
                'imagen_destacada' => 'uploads/showroom/monterrey/z4L4b1sXhm10QmRKNuUWzWiKQJnm0V4HArITdnkJ.jpg',
                'slug' => 'monterrey',
                'created_at' => '2022-09-30 02:21:22',
                'updated_at' => '2022-09-30 02:21:22',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre_showroom' => 'SANTA FE',
                'ciudad_showroom' => 'Ciudad de México',
                'numero_whatsapp' => '5215564849971',
                'mensaje_predeterminado_wp' => 'Hola, Necesito información sobre Roche Bobois',
                'numero_llamadas' => '525555707257',
                'iframe_google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3764.1859314020458!2d-99.27578588509442!3d19.361100286924934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9f836cc025cac01a!2zMTnCsDIxJzQwLjAiTiA5OcKwMTYnMjUuMCJX!5e0!3m2!1ses!2smx!4v1652937723882!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'direccion_showroom' => 'c/o Centro Comercial Santa Fe - Local 1702, Vasco de Quiroga 3800, La Toloapa Deleg, Cuajimalpa de Morelos, 05190 Ciudad de México, CDMX',
                'como_llegar' => 'https://www.google.com/maps/?q=19.3611003,-99.27359719999998',
                'id_tag_manager' => 'santafe',
                'imagen_destacada' => 'uploads/showroom/santa-fe/PWUIfC1W1A6aZokt7rE8Mdwgg9gvKDjFX54tlc12.jpg',
                'slug' => 'santa-fe',
                'created_at' => '2022-09-30 02:22:28',
                'updated_at' => '2022-09-30 02:22:28',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre_showroom' => 'ARTZ PEDREGAL',
                'ciudad_showroom' => 'Ciudad de México',
                'numero_whatsapp' => '5215611877978',
                'mensaje_predeterminado_wp' => 'Hola, Necesito información sobre Roche Bobois',
                'numero_llamadas' => '525555951871',
                'iframe_google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.2607560898127!2d-99.22195578509515!3d19.31448808695151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5ca38b9fc43e5724!2zMTnCsDE4JzUyLjIiTiA5OcKwMTMnMTEuMiJX!5e0!3m2!1ses!2smx!4v1652937627860!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'direccion_showroom' => 'Anillo Perif. 3720, Jardines del Pedregal, Álvaro Obregón, 01900 Ciudad de México, CDMX',
                'como_llegar' => 'https://www.google.com/maps/?q=19.3144881,-99.21976710000001',
                'id_tag_manager' => 'pedregal',
                'imagen_destacada' => 'uploads/showroom/artz-pedregal/a52MPG9gAmkZVardzJvux6gkYNEowV38kFl6dzwR.jpg',
                'slug' => 'artz-pedregal',
                'created_at' => '2022-09-30 02:23:41',
                'updated_at' => '2022-09-30 02:23:41',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre_showroom' => 'POLANCO',
                'ciudad_showroom' => 'Ciudad de México',
                'numero_whatsapp' => '5215518220015',
                'mensaje_predeterminado_wp' => 'Hola, Necesito información sobre Roche Bobois',
                'numero_llamadas' => '525552814172',
                'iframe_google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.5449698004236!2d-99.20552848509337!3d19.43205688688467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdeb394b261e7cdfa!2zMTnCsDI1JzU1LjQiTiA5OcKwMTInMTIuMCJX!5e0!3m2!1ses!2smx!4v1653084641648!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'direccion_showroom' => 'Av. Pdte. Masaryk 506, Polanco, Polanco I Secc, Miguel Hidalgo, 11530 Ciudad de México, CDMX',
                'como_llegar' => 'https://www.google.com/maps/?q=19.4320569,-99.20333979999998',
                'id_tag_manager' => 'polanco',
                'imagen_destacada' => 'uploads/showroom/polanco/QB6OVhJrauMPBH2pTFgUMaTnt5m6eOAtNv578w4q.jpg',
                'slug' => 'polanco',
                'created_at' => '2022-09-30 02:24:38',
                'updated_at' => '2022-09-30 02:24:38',
            ),
        ));
        
        
    }
}