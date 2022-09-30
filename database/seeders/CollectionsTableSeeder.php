<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CollectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('collections')->delete();
        
        \DB::table('collections')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre_disenador' => 'Vanessa Mitrani',
                'descripcion' => '<div>&nbsp;</div><div>Vanessa Mitrani&nbsp; ha sido única&nbsp; y experta en el diseño de piezas de vidrio. Sopla vidrio en contacto con cuero, porcelana, mármol y tela. Entre sus experimentos, sus creaciones de vidrio sobrio con metal se han convertido en una de sus firmas.&nbsp;<br><br></div><div>El saber hacer, el dominio técnico y el sentido artístico de Vanessa Mitrani le permitieron ingresar al Museo de Artes Decorativas en 2015, con ocho de sus piezas emblemáticas en las colecciones permanentes.&nbsp;<br><br></div><div>Vanessa Mitrani recuerda que el vidrio sigue siendo un material vivo, por no decir fluido, cuyas características flexibles se comunican con naturalidad con su enfoque del acto creativo.&nbsp;</div>',
                'imagen_destacada' => 'uploads/coleccion/vanessa-mitrani/evEptt4YzBJ2Cwa743TDBGfGpeurqx2fY3ZaZIf4.jpg',
                'nombre_coleccion' => 'Vanessa Mitrani',
                'foto_disenador' => 'uploads/coleccion/vanessa-mitrani/yfiWnnxhc3JD574omlqLEdjUtK5jVe64cKyNjrg1.jpg',
                'img_galeria' => '["uploads\\/coleccion\\/vanessa-mitrani\\/e5MzOKStNfQZ9wQe81MsCPbpfOlATnY4Qp0XjrSy.jpg","uploads\\/coleccion\\/vanessa-mitrani\\/5Acf0BVpJrLUyPPzX5McY61elQxPANUnLWF8UPDd.jpg","uploads\\/coleccion\\/vanessa-mitrani\\/js0oderwuzGxGn3r1wJYMOPdYwopWKH8vPQikdzq.jpg","uploads\\/coleccion\\/vanessa-mitrani\\/kdNu2QxzEmN8fFHUCpHKKGfvozG39uICOhC9EaiP.jpg","uploads\\/coleccion\\/vanessa-mitrani\\/6SKKCUTFTL61KMeK2p2ahDo3s7a2qDlnQjQuHZdk.jpg"]',
                'slug' => 'vanessa-mitrani',
                'created_at' => '2022-09-30 02:30:51',
                'updated_at' => '2022-09-30 02:30:51',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre_disenador' => 'Jean Paul Gaultier',
                'descripcion' => '<div>&nbsp;</div><div>"Mi intención no es pensar en mí mismo como un diseñador de muebles. Pero la moda también es una cuestión de construcción. Es una gran experiencia poder adaptar el know-how que es mío a otro entorno. Todos mis códigos, los encuentras aquí, rayas, corsetería, tatuajes, encajes“<br><br></div><div>“Era importante que la raya azul marino se pudiera combinar con un estampado de encaje, por ejemplo... Para crear un mosaico poco convencional y al mismo tiempo armonioso“…<br><br></div><blockquote><em>"con su brillantez creativa, su irreverencia, su forma única de romper los códigos convencionales y al mismo tiempo encarnar tan bien a Francia".&nbsp;</em></blockquote><div><br></div>',
                'imagen_destacada' => 'uploads/coleccion/jean-paul-gaultier/alDgtbM2ScXBTQ7JY2TmkTGOhM7Uz5J5QHSSJsNd.jpg',
                'nombre_coleccion' => 'MAH JONG',
                'foto_disenador' => 'uploads/coleccion/jean-paul-gaultier/ycsaJBRYJdQT7Zv2RK3geFvJGGJMntNS2OEPSO3e.jpg',
                'img_galeria' => '["uploads\\/coleccion\\/jean-paul-gaultier\\/jxoWABjOSbj41NllPzN7qrl3vW48oYYIJeGc3dm2.jpg","uploads\\/coleccion\\/jean-paul-gaultier\\/BsU7hu7pZRvwseFnNMbYHhv71N2aN4UJqsg3MvBo.jpg","uploads\\/coleccion\\/jean-paul-gaultier\\/TZNZpVmEKAUmAemZ7Qc5ILolII8Bos6HgBGkmJug.jpg"]',
                'slug' => 'jean-paul-gaultier',
                'created_at' => '2022-09-30 02:34:55',
                'updated_at' => '2022-09-30 02:34:55',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre_disenador' => 'Eugeni Quitllet',
                'descripcion' => '<div>&nbsp;</div><div>Antoni Gaudí pudo materializar una visión del mundo real moldeado por la ciencia y la naturaleza para crear una obra . . . La Pedrera!<br><br></div><div>Un edificio primitivo y futurista a la vez, y sobre todo es algo duro pero con un movimiento ondulado provocado por el aire, el viento y el mar. A base de mirarlo, lo he interpretado de mil maneras descomponiendo los elementos y recomponiéndolos. Precisamente la colección Pulp nace de observar mucho tiempo La Pedrera. Las mesas, sillas y sillones son como piedras que se juntan y forman un solo volumen…&nbsp;</div>',
                'imagen_destacada' => 'uploads/coleccion/eugeni-quitllet/xNIjqsCr6YLcBMLDJVLht3No1RTPW3sgwY7FHEyl.jpg',
                'nombre_coleccion' => 'Pulp',
                'foto_disenador' => 'uploads/coleccion/eugeni-quitllet/APszPlTa5J2g12Tw1ZsEmQ2NM7VimCNGET50wp9B.jpg',
                'img_galeria' => '["uploads\\/coleccion\\/eugeni-quitllet\\/ogemTbu4YPn3VhrFZdG23C1LwuJWr4NfUi76BoKF.jpg","uploads\\/coleccion\\/eugeni-quitllet\\/qA568W2NJZrXglUkbLM2EZKKoDsolYCku55PZQFF.jpg","uploads\\/coleccion\\/eugeni-quitllet\\/JbYjRoDRazBc710dnCCHPYVNSfJ6PeOLNDSVqgYc.jpg"]',
                'slug' => 'eugeni-quitllet',
                'created_at' => '2022-09-30 02:36:49',
                'updated_at' => '2022-09-30 02:36:49',
            ),
        ));
        
        
    }
}