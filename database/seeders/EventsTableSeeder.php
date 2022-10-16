<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('events')->delete();
        
        \DB::table('events')->insert(array (
            0 => 
            array (
                'id' => 1,
                'categoria_id' => 1,
                'nombre_evento' => 'Una Noche muy Parisina',
                'descripcion' => '<div>&nbsp;Nuestra tienda de Masaryk se transforma en el salón del Moulin-Rouge: baile y música nos aseguran la diversión de una de las maravillosas noches parisinas de fines del siglo XIX.&nbsp;</div>',
                'fecha' => '2022-10-18',
                'hora' => '12:46 AM',
                'imagen_destacada' => 'uploads/evento/una-noche-muy-parisina/dCg5lNO0F0mmrckcGdx8Xh8o7mcCOWyWNxGzaz3s.jpg',
                'slug' => 'una-noche-muy-parisina',
                'created_at' => '2022-10-16 05:43:01',
                'updated_at' => '2022-10-16 05:43:01',
            ),
            1 => 
            array (
                'id' => 2,
                'categoria_id' => 1,
                'nombre_evento' => 'Una Noche muy Argentina',
                'descripcion' => '<div>&nbsp;El tango, una pasión que atraviesa fronteras y une culturas.&nbsp;</div>',
                'fecha' => '2022-10-20',
                'hora' => '12:48 AM',
                'imagen_destacada' => 'uploads/evento/una-noche-muy-argentina/WxqZn9LFuz6S8ytgoa4mAb5SVQ7pG2nlRE3b11bH.jpg',
                'slug' => 'una-noche-muy-argentina',
                'created_at' => '2022-10-16 05:43:40',
                'updated_at' => '2022-10-16 05:43:40',
            ),
            2 => 
            array (
                'id' => 3,
                'categoria_id' => 3,
                'nombre_evento' => 'Motorsport Festival By Roche Bobois',
                'descripcion' => '<div>Primer evento de este tipo en Mèxico y en su corazón se encuentra el recorrido dentro de Bosque Real. Donde 50 autos, la mayoría antes de 1980 competirán.<br><br></div><div>Con ceremonia de premiaciòn dentro de la Casa Club Bosque Real.</div>',
                'fecha' => '2022-10-30',
                'hora' => '05:44 AM',
                'imagen_destacada' => 'uploads/evento/motorsport-festival-by-roche-bobois/VNV13vkqY8j00cOZ59BOFnm5NyC1FSTUBBEkOf9g.png',
                'slug' => 'motorsport-festival-by-roche-bobois',
                'created_at' => '2022-10-16 05:44:24',
                'updated_at' => '2022-10-16 05:44:24',
            ),
            3 => 
            array (
                'id' => 4,
                'categoria_id' => 1,
                'nombre_evento' => 'Noche de Jazz - Roche Bobois',
                'descripcion' => '<div>&nbsp;Celebra una velada de arte y cultura muy especial y elegante, en la sala de exposición Roche Bobois Masarik.<br><br></div><div>Pianistas: Juan Josè Calatayud, Eugenio Toussaint&nbsp;</div>',
                'fecha' => '2022-10-25',
                'hora' => '05:44 AM',
                'imagen_destacada' => 'uploads/evento/noche-de-jazz-roche-bobois/iLwnc81SjrGqwVhv71s8dowFhVoP0w2AqH5y8HRB.png',
                'slug' => 'noche-de-jazz-roche-bobois',
                'created_at' => '2022-10-16 05:45:09',
                'updated_at' => '2022-10-16 05:45:09',
            ),
            4 => 
            array (
                'id' => 5,
                'categoria_id' => 2,
                'nombre_evento' => 'Torneo de Golf By Roche Bobois',
                'descripcion' => '<div>&nbsp;Lanzamiento del Primer Torneo de Golf <em>By Roche Bobois</em> "<em>Art de Vivre"... </em>en "El Jaguar Golf Course"... el primero de una larga serie con prestigiosos socios.&nbsp;</div>',
                'fecha' => '2022-11-02',
                'hora' => '03:55 AM',
                'imagen_destacada' => 'uploads/evento/torneo-de-golf-by-roche-bobois/xzgmaOZ3GN80qk2LB8WO9Jnsc9vOz9rwiYdXVJPD.png',
                'slug' => 'torneo-de-golf-by-roche-bobois',
                'created_at' => '2022-10-16 05:55:30',
                'updated_at' => '2022-10-16 05:55:30',
            ),
            5 => 
            array (
                'id' => 6,
                'categoria_id' => 3,
                'nombre_evento' => 'Encuentro Art de Vivre',
                'descripcion' => '<div>&nbsp;Degustación de de Chateau_Rasque... Audi E-Tron test drive... Un domingo con&nbsp; Roche Bobois...&nbsp;</div>',
                'fecha' => '2022-10-31',
                'hora' => '08:56 AM',
                'imagen_destacada' => 'uploads/evento/encuentro-art-de-vivre/fD1IEsFhYnFxPQbhuMwcV1NBejkXQO9n4moYWs6i.jpg',
                'slug' => 'encuentro-art-de-vivre',
                'created_at' => '2022-10-16 05:56:29',
                'updated_at' => '2022-10-16 05:56:29',
            ),
            6 => 
            array (
                'id' => 7,
                'categoria_id' => 2,
                'nombre_evento' => 'El Gran Premio de la Ciudad de Mèxico',
                'descripcion' => '<div>Roche Bobois te invita a disfrutar del Gran Premio de la Ciudad de Mèxico&nbsp; desde su&nbsp; Show Room&nbsp; que incluirà especialidades gourmet y barra de vinos&nbsp; tintos y blancos.</div>',
                'fecha' => '2022-11-04',
                'hora' => '08:48 AM',
                'imagen_destacada' => 'uploads/evento/el-gran-premio-de-la-ciudad-de-mexico/5cONsr7QcwY0n4Br3vkpmFj1tH9cmGoIlFAXnztA.png',
                'slug' => 'el-gran-premio-de-la-ciudad-de-mexico',
                'created_at' => '2022-10-16 05:59:58',
                'updated_at' => '2022-10-16 05:59:58',
            ),
        ));
        
        
    }
}