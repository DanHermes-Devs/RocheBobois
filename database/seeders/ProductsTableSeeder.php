<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 8,
                'subcategory_id' => NULL,
                'nombre_producto' => 'DOMINO',
                'descripcion' => '<div>Sistema modular componible hasta el infinito a partir de chauffeses, elementos rectos o de ángulo y elementos chaise longue. Todos los elementos están revestidos en tela Chroma, acolchados y realizados a mano.</div>',
                'precio' => '40000.00',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => NULL,
                'oportunidad_unica' => 0,
                'home_office' => NULL,
                'coleccion_pertenece' => NULL,
                'imagen_destacada' => 'uploads/productos/domino/Iv4XfDef3hJGV2F2Mr96sZhjPPj1tzYAbAzW79rt.jpg',
                'galeria' => '["uploads\\/productos\\/domino\\/v7z5qWcCPEHvSn12A2dAWOL3Cs27vG846obt80iK.jpg","uploads\\/productos\\/domino\\/SNZX1ndNiDVjaE6QUxuLstVLHiUw5Az0gXuwdgdt.jpg","uploads\\/productos\\/domino\\/8rTd51MBSObIhIWcm7VN4M8pw4sREwaBZGEcLoR6.jpg","uploads\\/productos\\/domino\\/spdwgOMV8is5RddigBJJekgqwzPiPe6o3bDB4aAy.jpg"]',
                'slug' => 'domino',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 05:49:18',
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 4,
                'subcategory_id' => NULL,
                'nombre_producto' => 'Librero RAMSY',
                'descripcion' => '<div>Diseñador: Max Voytenko<br><br>Estructura de Bronce<br><br>RAMSY es un mòdulo de librerìa ligero y poco profundo, con una estructura original: los arcos que sostienen los cinco estantes corren en diagonal por delante y por detrás, creando un juego visual dinámico.<br><br>Largo 206 x Alto 218 x Profundo 38 cm&nbsp;<br><br></div>',
                'precio' => '5200',
                'precio_descuento' => '4500.00',
                'mostrar_en_sales' => 0,
                'best_seller' => NULL,
                'oportunidad_unica' => 1,
                'home_office' => NULL,
                'coleccion_pertenece' => NULL,
                'imagen_destacada' => 'uploads/productos/librero-ramsy/4l2UysOcCTUrj0WptU4kLBMnodiI8XbbhVtLwj1k.jpg',
                'galeria' => '["uploads\\/productos\\/librero-ramsy\\/X2QedNVcGa6g5NZ57kEP3xIB6pXPVmYE2vLn3VKR.jpg","uploads\\/productos\\/librero-ramsy\\/HdPs1dZEtFqT7LrbGGVxLtedZqNKQHbfZNldDZQq.jpg"]',
                'slug' => 'librero-ramsy',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 05:50:57',
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 9,
                'subcategory_id' => NULL,
                'nombre_producto' => 'Sillón EPOQ',
                'descripcion' => '<div>Diseñador : Pierre Dubois &amp; Aimè Cècil<br><br>Respaldo Alto_Tela<br><br>Sillòn clásico y atemporal, està en línea de los Chesterfield con un toque que lo hace muy especial. Su almohadillado en la parte trasera le da toda su originalidad, gracias a un patrón único marcado por botones de cuero.<br><br>Largo 74 x Alto 100 x Profundo 98 cm&nbsp;<br><br></div>',
                'precio' => '2480',
                'precio_descuento' => '1700',
                'mostrar_en_sales' => 0,
                'best_seller' => NULL,
                'oportunidad_unica' => 1,
                'home_office' => NULL,
                'coleccion_pertenece' => NULL,
                'imagen_destacada' => 'uploads/productos/sillon-epoq/m5K7GuQUb8vDXGXskHC47QIqTnlvxELr5WsvjYWr.jpg',
                'galeria' => '["uploads\\/productos\\/sillon-epoq\\/PKOnxOnHaet0jiwj1YNlg98YScrtOw1UrEQgaFAg.jpg"]',
                'slug' => 'sillon-epoq',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 05:59:28',
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 10,
                'subcategory_id' => NULL,
                'nombre_producto' => 'Tapete PLEASURE',
                'descripcion' => '<div>Un juego de ópticas o plisados con rayas engañosamente rectas, como ondas en movimiento atravesando al superficie de la alfombra.&nbsp;<br><br>Largo 200 x Alto 300 cm</div>',
                'precio' => '2990',
                'precio_descuento' => '2000',
                'mostrar_en_sales' => 0,
                'best_seller' => NULL,
                'oportunidad_unica' => 1,
                'home_office' => NULL,
                'coleccion_pertenece' => NULL,
                'imagen_destacada' => 'uploads/productos/tapete-pleasure/RGytQMqne7nU4Af7q0DFhmtfoIx3qtoit2WBnGky.png',
                'galeria' => '["uploads\\/productos\\/tapete-pleasure\\/ZHyn4dbjGfk2u91Vmf1KXMykrHiB84saGLMBQWvw.jpg","uploads\\/productos\\/tapete-pleasure\\/xfZHZ1ig8TudlxdVPNc0dZo7m6qq12tW3pkE5wlE.jpg"]',
                'slug' => 'tapete-pleasure',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 06:01:10',
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 4,
                'subcategory_id' => NULL,
                'nombre_producto' => 'Modular INTRALATINA',
                'descripcion' => '<div>Intralatina es un completo programa de elementos modulares que permite infinitas posibilidades para la composición de una pared. Combina cajones y estanterías. Es la esencia de la personalización, para la sala o el dormitorio.&nbsp;<br><br>Ancho 365 x Alto 85 x Profundo 50 cm</div>',
                'precio' => '6000',
                'precio_descuento' => '5700',
                'mostrar_en_sales' => 0,
                'best_seller' => NULL,
                'oportunidad_unica' => 1,
                'home_office' => NULL,
                'coleccion_pertenece' => NULL,
                'imagen_destacada' => 'uploads/productos/modular-intralatina/hBi0jyMLcCGWwq8KKlJqw089WHDIKHgcdo5jzGsV.jpg',
                'galeria' => '["uploads\\/productos\\/modular-intralatina\\/Kan99UvMwjbXHJFUIANbvYkPXuunIt598w4rYSur.jpg"]',
                'slug' => 'modular-intralatina',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 05:47:13',
            ),
            5 => 
            array (
                'id' => 6,
                'category_id' => 9,
                'subcategory_id' => NULL,
                'nombre_producto' => 'Sofà INTRIGUE',
                'descripcion' => '<div>Diseño Studio Roche Bobois<br><br>Tapizado en tejido Giada. Estructura en madera maciza de abeto y contrachapado de pino. Base en metal con acabado bronce.</div>',
                'precio' => '5200',
                'precio_descuento' => '4500',
                'mostrar_en_sales' => 0,
                'best_seller' => NULL,
                'oportunidad_unica' => 1,
                'home_office' => NULL,
                'coleccion_pertenece' => NULL,
                'imagen_destacada' => 'uploads/productos/sofa-intrigue/Fzete7uQiN0LXaiij7EODR86IEn6mhi3KaXvddqH.jpg',
                'galeria' => '["uploads\\/productos\\/sofa-intrigue\\/btxj2lSleIT4wJsQ23jywaYFL7MJdvMuXmC2x6iV.jpg","uploads\\/productos\\/sofa-intrigue\\/GZu3pfmIZOkIdYizGebGqbrHn7TCuvvq7E0KxQaQ.jpg","uploads\\/productos\\/sofa-intrigue\\/tLBiJzUEPGwA3yHEdpDAXwz1ycI1rayPqD5m3lsb.jpg"]',
                'slug' => 'sofa-intrigue',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 05:47:59',
            ),
            6 => 
            array (
                'id' => 7,
                'category_id' => 1,
                'subcategory_id' => NULL,
                'nombre_producto' => 'Mesa de Comedor AQUA',
                'descripcion' => '<div>Diseñador: Fabrice Berrux<br><br>Mármol de Levanto de Liguria - se reservó una veta completa de la cantera para uso exclusivo de Roche Bobois. Edición limitada de 200 piezas, numeradas y firmadas por Fabrice Berrux.</div>',
                'precio' => '7500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => NULL,
                'oportunidad_unica' => 0,
                'home_office' => NULL,
                'coleccion_pertenece' => NULL,
                'imagen_destacada' => 'uploads/productos/mesa-de-comedor-aqua/Glh4jQVgYdh7xViLRocmrj1sCIgPApMpYxhlRlAw.jpg',
                'galeria' => '["uploads\\/productos\\/mesa-de-comedor-aqua\\/bfOdMefnneJQbbwZRZ0GcnqVT2hK0HbAKMLlSHYi.jpg"]',
                'slug' => 'mesa-de-comedor-aqua',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 06:02:34',
            ),
            7 => 
            array (
                'id' => 8,
                'category_id' => 1,
                'subcategory_id' => 0,
                'nombre_producto' => 'Mesa de Comedor WINCH',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nTapa fija en cerámica Calacatta Oro Brillo. Piernas, estructura y juntas de la mesa en madera maciza de cerezo. Acabado toffee, elementos decorativos con acabado latón.',
                'precio' => '2750',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'mesa-de-comedor-winch',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            8 => 
            array (
                'id' => 9,
                'category_id' => 1,
                'subcategory_id' => 0,
                'nombre_producto' => 'Mesa de Comedor PARAMETRE',
                'descripcion' => 'Oda a la madera
\\n
\\nObra de maestros, esta serie de muebles en cálidos tonos de madera combina técnicas tradicionales de carpintería con una estética de diseño contemporánea.',
                'precio' => '5000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'mesa-de-comedor-parametre',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            9 => 
            array (
                'id' => 10,
                'category_id' => 1,
                'subcategory_id' => 0,
                'nombre_producto' => 'Mesa de Comedor PULP',
                'descripcion' => 'Diseñador: Eugeni Quitllet
\\n
\\nComedor PULP, evoca formas maleables. Blanco cremoso. En madera maciza de fresno certificado FSC
\\n
\\nColección PULP se basa en la disociación de los elementos.',
                'precio' => '4510',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'mesa-de-comedor-pulp',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            10 => 
            array (
                'id' => 11,
                'category_id' => 13,
                'subcategory_id' => 0,
                'nombre_producto' => 'Mesa de Centro GALET',
                'descripcion' => 'Diseñador: Messieurs
\\n
\\nComo pequeños túmulos dispuestos a lo largo de un camino, esta mesa de centro diseñada por Messieurs tiene tres tapas, de las cuales dos son pivotantes, con acabados distintos: laca negra mate en la parte inferior, laca brillante o fundición de aluminio en el centro y fresno macizo superior.',
                'precio' => '3500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'mesa-de-centro-galet',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            11 => 
            array (
                'id' => 12,
                'category_id' => 13,
                'subcategory_id' => 0,
                'nombre_producto' => 'Mesa de Centro GORIZIA',
                'descripcion' => 'Diseñador: Thierry Picassette
\\n
\\nMesa de centro y auxiliar en acero (3 acabados) con tapa de cristal transparente.',
                'precio' => '3000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'mesa-de-centro-gorizia',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            12 => 
            array (
                'id' => 13,
                'category_id' => 4,
                'subcategory_id' => 0,
                'nombre_producto' => 'Biblioteca KETCH',
                'descripcion' => 'Diseñador: Studio Nomon
\\n
\\nLibreria modular con varillas en nogal macizo y baldas en MDF chapado en nogal americano. Base y soporte de pared en acero lacado latón.
\\n
\\nViejas jarcias, barco de pesca, queche o goleta... Una brisa salada emana de esta librerìa con sus varillas erguidas como mástiles orgullosos.',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'biblioteca-ketch',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            13 => 
            array (
                'id' => 14,
                'category_id' => 4,
                'subcategory_id' => 0,
                'nombre_producto' => 'Biblioteca SMOKE',
                'descripcion' => 'Diseñador: Patrick De Glo De Besses
\\n
\\nUna libreria ondulante con un encanto asiático, este nuevo diseño de Patrick De Glo De Besses tiene una estructura sacada en negro manganeso con sus onduladas que sostienen cuatro unidades de almacenamiento de madera idénticas pero alineadas con puertas abatibles.',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'biblioteca-smoke',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            14 => 
            array (
                'id' => 15,
                'category_id' => 4,
                'subcategory_id' => 0,
                'nombre_producto' => 'Biblioteca FLAP',
                'descripcion' => 'Diseñador: Renè Bouchara
\\n
\\nLibreria con cinco filas de seis alas giratorios en MDF chapado en roble teñido. Estantes, paneles verticales y trasera en MDF lacado satinado (3 colores)',
                'precio' => '3500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'biblioteca-flap',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            15 => 
            array (
                'id' => 16,
                'category_id' => 6,
                'subcategory_id' => 0,
                'nombre_producto' => 'Pouf APEX',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nOtomana tapizada en tejido Techno 2D. Asiento almohadillado con espuma HR bidensidad.
\\n
\\nEs la combinación perfecta de estética y comodidad. Su diseño, forma y volumen la convierten en una pequeña silla decorativa fácil de incorporar a cualquier interior.',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'pouf-apex',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            16 => 
            array (
                'id' => 17,
                'category_id' => 6,
                'subcategory_id' => 0,
                'nombre_producto' => 'Pouf IMPROVISTE',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nAncho 134 x Alto 37 x Profundo 62 cm',
                'precio' => '2180',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'pouf-improviste',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            17 => 
            array (
                'id' => 18,
                'category_id' => 3,
                'subcategory_id' => 0,
                'nombre_producto' => 'Escritorio PULP',
                'descripcion' => 'Diseñador: Eugeni Quitllet
\\n
\\nUna colección de mesas, sillas y sillones con una estética biomorfa, donde la línea recta se encuentra ausente y de acabados refinados.',
                'precio' => '4510',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 3,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'escritorio-pulp',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            18 => 
            array (
                'id' => 19,
                'category_id' => 12,
                'subcategory_id' => 0,
                'nombre_producto' => 'Silla Pata Central PULP',
                'descripcion' => 'Diseñador: Eugeni Quitllet
\\n
\\nSilla Pulp en Tela',
                'precio' => '1110',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 3,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'silla-pata-central-pulp',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            19 => 
            array (
                'id' => 20,
                'category_id' => 12,
                'subcategory_id' => 0,
                'nombre_producto' => 'Silla 4 Patas c/ descansa brazos PULP',
                'descripcion' => 'Diseñador: Eugeni Quitllet
\\n
\\nSilla Pulp de cuatro patas con descansa brazos',
                'precio' => '1110',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'silla-4-patas-c-descansa-brazos-pulp',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            20 => 
            array (
                'id' => 21,
                'category_id' => 1,
                'subcategory_id' => 0,
                'nombre_producto' => 'Silla 4 patas PULP',
                'descripcion' => 'Diseñador: Eugeni Quitllet
\\n
\\nSilla de cuatro patas
\\n
\\n&nbsp;',
                'precio' => '1110',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 3,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'silla-4-patas-pulp',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            21 => 
            array (
                'id' => 22,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn PULP',
                'descripcion' => 'Diseñador: Eugeni Quitllet
\\n
\\nSillòn Pulp en Tejido Orsetto Flex',
                'precio' => '3720',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 3,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-pulp',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            22 => 
            array (
                'id' => 23,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn PULP',
                'descripcion' => 'Diseñador: Eugeni Quitllet
\\n
\\nSillòn PULP en piel',
                'precio' => '3500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 3,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-pulp',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            23 => 
            array (
                'id' => 24,
                'category_id' => 12,
                'subcategory_id' => 0,
                'nombre_producto' => 'Silla de Oficina PULP',
                'descripcion' => 'Diseñador: Eugeni Quitllet
\\n
\\nSilla de Oficina PULP en Orsetto Flex',
                'precio' => '4400',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 3,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'silla-de-oficina-pulp',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            24 => 
            array (
                'id' => 25,
                'category_id' => 0,
                'subcategory_id' => 0,
                'nombre_producto' => 'Reposa pies PULP',
                'descripcion' => 'Diseñador: Eugeni Quitllet
\\n
\\n&nbsp;',
                'precio' => '1590',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 3,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'reposa-pies-pulp',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            25 => 
            array (
                'id' => 26,
                'category_id' => 0,
                'subcategory_id' => 0,
                'nombre_producto' => 'Mesa Pedestal PULP',
                'descripcion' => 'Diseñador: Eugeni Quitllet
\\n
\\nMesa auxiliar Pulp laca brillante',
                'precio' => '1000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 3,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'mesa-pedestal-pulp',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            26 => 
            array (
                'id' => 27,
                'category_id' => 0,
                'subcategory_id' => 0,
                'nombre_producto' => 'Mesa Auxiliar PULP',
                'descripcion' => 'Diseñador: Eugeni Quitllet
\\n
\\nMesa auxiliar PULP en lacado brillante.',
                'precio' => '1700',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 3,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'mesa-auxiliar-pulp',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            27 => 
            array (
                'id' => 28,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete EXTRAVERTI',
                'descripcion' => 'Diseñador: Jean Paul Gaultier
\\n
\\nTapete con un diseño tan extrovertido como su creador. Tufting en Nueva Zelanda.',
                'precio' => '2700',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 2,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-extraverti',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            28 => 
            array (
                'id' => 29,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete DUNKERQUE',
                'descripcion' => 'Diseñador: Jean Paul Gaultier
\\n
\\nAlfombra marinera + pompones. 100% lana de cordero.
\\n
\\nAlto 200 x Largo 300 cm',
                'precio' => '2700',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 2,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-dunkerque',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            29 => 
            array (
                'id' => 30,
                'category_id' => 11,
                'subcategory_id' => 0,
                'nombre_producto' => 'Cojìn TEATRO DON JUAN',
                'descripcion' => 'Diseñador: Jean Paul Gaultier
\\n
\\nCojìn cuadrado con bordes en satin. Bordado gótico "Gaultier", borde lateral con puntada.
\\n
\\n&nbsp;',
                'precio' => '1000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 2,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'cojin-teatro-don-juan',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            30 => 
            array (
                'id' => 31,
                'category_id' => 11,
                'subcategory_id' => 0,
                'nombre_producto' => 'Cojìn KISS',
                'descripcion' => 'Diseñador: Jean Paul Gaultier
\\n
\\nDibujo estampado sobre terciopelo. Dorso de terciopelo liso.
\\n
\\nAlto 60 x Largo 60 cm',
                'precio' => '1000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 2,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'cojin-kiss',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            31 => 
            array (
                'id' => 32,
                'category_id' => 11,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete MYTHE',
                'descripcion' => 'Diseñador: Jean Paul Gaultier
\\n
\\nAlfombra tejida a mano. 90% lana y 10% algodón.
\\n
\\nAlto 200 x Largo 300 cm',
                'precio' => '1200',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 2,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-mythe',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            32 => 
            array (
                'id' => 33,
                'category_id' => 8,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sala Mah Jong Jean Paul Gaultier',
                'descripcion' => 'Diseñador: Hans Hopfer
\\n
\\nComposición Mah Jong Jean Paul Gaultier con Plataformas
\\n
\\nHans Hopfet diseño el Mah Jong en 1971, con un enfoque innovador y sencillo de la comodidad. Ya sea como sofaldos de esquina, sofaldos recto, sillón o cama supletoria, el Mah Jong fue concebido para adaptarse libremente en función y forma. Ahora vestido de Alta Costura por Jean Paul Gaultier.
\\n
\\n&nbsp;',
                'precio' => '7500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 2,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sala-mah-jong-jean-paul-gaultier',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            33 => 
            array (
                'id' => 34,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn AROBASE',
                'descripcion' => 'Diseñador: Antoine Fritsch &amp; Vivien Durisotti
\\n
\\nSuaves líneas del cuarzo o de la piedra pulida, con una sobredosis de elegancia.',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-arobase',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            34 => 
            array (
                'id' => 35,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn APARTE',
                'descripcion' => 'Diseñador: Simone Cagnazzo
\\n
\\nUna pieza misteriosa: descansando sobre una estructura de metal, el asiento discretamente almohadillado va y viene. Esta idea original de Simone Cagnazzo permite inclinar el sillón para una variedad de posiciones cómodas realzadas por el reposapiés.
\\n
\\nSillòn tapizado en tela Càlin.',
                'precio' => '3400',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-aparte',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            35 => 
            array (
                'id' => 36,
                'category_id' => 8,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sofà PRESAGE',
                'descripcion' => 'Diseñador: Antoine Fritsch &amp; Vivien Durisotti
\\n
\\nTiene las lìneas suaves del cuarzo o la piedra pulida: los reposabrazos en forma de guijarros cuelgan a los lados, en juego con los cojines del respaldo. El divertido efecto es el de un kit de construcción gigante, ¡pero con una sobredosis de elegancia!
\\n
\\nTapizado en tela Orsetto Flex.
\\n
\\n&nbsp;
\\n
\\n&nbsp;',
                'precio' => '4300',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sofa-presage',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            36 => 
            array (
                'id' => 37,
                'category_id' => 2,
                'subcategory_id' => 0,
                'nombre_producto' => 'Jarrón NO LIMIT',
                'descripcion' => 'Diseñador: Vanessa Mitrani
\\n
\\nLa colección de Jarrones No Limit nos sumerge, con sus peces de porcelana, en un universo japonés imaginado por Vanessa Mitrani.',
                'precio' => '550',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 1,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'jarron-no-limit',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            37 => 
            array (
                'id' => 38,
                'category_id' => 2,
                'subcategory_id' => 0,
                'nombre_producto' => 'Jarròn FAUNA',
                'descripcion' => 'Diseñador: Vanessa Mitrani
\\n
\\nFabricación 100% francesa
\\n
\\nVidrio soplado - bronce
\\n
\\nFiguras: mono, tigre y elefante
\\n
\\nColores: humo, azul y verde
\\n
\\n&nbsp;',
                'precio' => '450',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 1,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'jarron-fauna',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            38 => 
            array (
                'id' => 39,
                'category_id' => 2,
                'subcategory_id' => 0,
                'nombre_producto' => 'Jarròn FRAGMENT',
                'descripcion' => 'Diseñador: Vanessa Mitrani
\\n
\\nConjunto de dos jarrones, vidrio soplado, colores desierto y cielo.',
                'precio' => '700',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 1,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'jarron-fragment',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            39 => 
            array (
                'id' => 40,
                'category_id' => 2,
                'subcategory_id' => 0,
                'nombre_producto' => 'Jarròn MEDAILLON',
                'descripcion' => 'Diseñador: Vanessa Mitrani
\\n
\\nJarrones de vidrio soplado - jade o piedra
\\n
\\nColores palo jade - negro',
                'precio' => '600',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 1,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'jarron-medaillon',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            40 => 
            array (
                'id' => 41,
                'category_id' => 8,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sofà SYNTONE',
                'descripcion' => 'Diseñador: Philippe Bouix
\\n
\\nEste amplio y envolvente sofà es increìblemente comodo. Puedes saber con solo mirarlo cuàn lujosamente serán los asientos. Tiene un discreto mecanismo para subir y bajar el respaldo.',
                'precio' => '8000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sofa-syntone',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            41 => 
            array (
                'id' => 42,
                'category_id' => 8,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sofà SCENARIO 2',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nTapizado en piel Sweet, plena flor, acabado pigmentado. Respaldos de doble profundidad, con mecanismo regulable, reposabrazos con apertura lateral. Estructura de madera maciza de abeto, contrachapado de pino y tablero de partículas.',
                'precio' => '20500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sofa-scenario-2',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            42 => 
            array (
                'id' => 43,
                'category_id' => 5,
                'subcategory_id' => 0,
                'nombre_producto' => 'Làmpara REINE',
                'descripcion' => 'Diseñador: Chape &amp; Mache
\\n
\\nAplique de pared con elemento de iluminación central. Pètalos en tejido 3D, íntegramente confeccionados y cosidos a mano.',
                'precio' => '2200',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'lampara-reine',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            43 => 
            array (
                'id' => 44,
                'category_id' => 5,
                'subcategory_id' => 0,
                'nombre_producto' => 'Làmpara SAIL',
                'descripcion' => 'Diseñador: Pepe Llaudet
\\n
\\nLàmpara de pie y lámpara con estructura y base en metal lacado blanco o negro satinado. Velo ajustable, difusor blanco en papel estucado mate lavable.
\\n
\\nEsfera en blanco opaco mate. LED integrado.',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'lampara-sail',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            44 => 
            array (
                'id' => 45,
                'category_id' => 5,
                'subcategory_id' => 0,
                'nombre_producto' => 'Làmpara OISEAU',
                'descripcion' => 'Diseñador: Sean Connors
\\n
\\nFamilia de lámparas de pie de silueta curva y zoomorfa. Sus uniones articuladas les permiten girar, mantenerse erguidos o doblarse',
                'precio' => '2500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'lampara-oiseau',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            45 => 
            array (
                'id' => 46,
                'category_id' => 8,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sofà IMPROVISTE',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nTapizado en tela Moorea (100% acrílico). Respaldos regulables con mecanismo manual, estructura metálica en acabado cromo negro. Cojìnes de respaldo en edredón de plumas de oca y pato sobre alma de espuma bidensidad 21-25 kg/m3.
\\n
\\nEstructura de abeto macizo, contrachapado de pino y tablero de partículas. Base de haya maciza en tinte negro.',
                'precio' => '12000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sofa-improviste',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            46 => 
            array (
                'id' => 47,
                'category_id' => 2,
                'subcategory_id' => 0,
                'nombre_producto' => 'Jarròn MARMARO',
                'descripcion' => 'Diseñador: Jean-Christophe Clair
\\n<div class="page" title="Page 16">
\\n<div class="section">
\\n<div class="layoutArea">
\\n<div class="column">
\\n
\\nJarrones en loza de barro rojo, torneados y esmaltados y luego decorados a mano.
\\n
\\nAcabado en esmalte transparente para la parte superior. Esmalte mate para la parte inferior.
\\n
\\nDisponible en otros colores
\\n
\\n</div>
\\n</div>
\\n</div>
\\n</div>',
                'precio' => '500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 4,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'jarron-marmaro',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            47 => 
            array (
                'id' => 48,
                'category_id' => 2,
                'subcategory_id' => 0,
                'nombre_producto' => 'Jarrones GHOST',
                'descripcion' => 'Diseñador: Cèdric Ragot
\\n
\\nPlato, Centro de Mesa y Jarrones en cerámica esmaltada.',
                'precio' => '400',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 4,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'jarrones-ghost',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            48 => 
            array (
                'id' => 49,
                'category_id' => 2,
                'subcategory_id' => 0,
                'nombre_producto' => 'Jarrones SCOTT',
                'descripcion' => 'Diseñador: Pierre Dubois &amp; Aime Cècil
\\n<div class="page" title="Page 30">
\\n<div class="section">
\\n<div class="layoutArea">
\\n<div class="column">
\\n
\\nJarrones de Pasta de Vidrio.
\\n
\\n</div>
\\n</div>
\\n</div>
\\n</div>',
                'precio' => '700',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 4,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'jarrones-scott',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            49 => 
            array (
                'id' => 50,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete MISTY',
                'descripcion' => 'Alfombra tufting 60% seda vegetal y 40% lana',
                'precio' => '2500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 1,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-misty',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            50 => 
            array (
                'id' => 51,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete ANTRIM',
                'descripcion' => 'Missoni Home
\\n
\\nAlfombra tejida a mano en 100% lana de Nueva Zelanda',
                'precio' => '4430',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 1,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-antrim',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            51 => 
            array (
                'id' => 52,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete LILY BRUSH',
                'descripcion' => 'Alfombra tejida a mano en 100% lana de Nueva Zelanda',
                'precio' => '3750',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 1,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-lily-brush',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            52 => 
            array (
                'id' => 53,
                'category_id' => 5,
                'subcategory_id' => 0,
                'nombre_producto' => 'Pantalla PHENIX',
                'descripcion' => 'Diseñador: Piergil Fourquiè
\\n
\\nPantalla luminosa con estructura metálica giratoria y carcasa de plástico lacado en negro mate. Estructura revestida de tejido 3D blanco con fundas desfundables.',
                'precio' => '2550',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 3,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'pantalla-phenix',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            53 => 
            array (
                'id' => 54,
                'category_id' => 5,
                'subcategory_id' => 0,
                'nombre_producto' => 'Làmpara de Pie CACTUS',
                'descripcion' => 'Diseñador: Fabrice Berrux
\\n
\\nLàmpara de pie con base en mármol blanco de Carrara o metal blanco. Conjunto de tres aros difusores en cinta de tela blanca. LED integrado.
\\n<div class="page" title="Page 12">
\\n<div class="section">
\\n<div class="layoutArea">
\\n<div class="column">
\\n<pre id="tw-target-text" class="tw-data-text tw-text-large tw-ta" dir="ltr" data-placeholder="Traducción"></pre>
\\n</div>
\\n</div>
\\n</div>
\\n</div>',
                'precio' => '2030',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 3,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'lampara-de-pie-cactus',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            54 => 
            array (
                'id' => 55,
                'category_id' => 5,
                'subcategory_id' => 0,
                'nombre_producto' => 'Làmpara de Pie KYUDO',
                'descripcion' => 'Diseñador: Hansandfranz
\\n
\\nLàmpara de Pie con difusor orientable montado sobre guía deslizante, estructura en aluminio. LED integrado. Acabado azul exclusivo.',
                'precio' => '2200',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 3,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'lampara-de-pie-kyudo',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            55 => 
            array (
                'id' => 56,
                'category_id' => 11,
                'subcategory_id' => 0,
                'nombre_producto' => 'Cojìn ICHIMATSU',
                'descripcion' => 'Cojìn rectangular en Tejido Uroko 150 con tira de Tejido Ichimatsu 148 en el tejido. Cubierta removible.',
                'precio' => '90',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 2,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'cojin-ichimatsu',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            56 => 
            array (
                'id' => 57,
                'category_id' => 11,
                'subcategory_id' => 0,
                'nombre_producto' => 'Cojìn ATENE',
                'descripcion' => 'Missoni Home
\\n
\\nCojìn rectangular en jacquard amarillo 100, laterales en jacquard Austria 156 y Austria 134, funda desfundable.',
                'precio' => '190',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 2,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'cojin-atene',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            57 => 
            array (
                'id' => 58,
                'category_id' => 11,
                'subcategory_id' => 0,
                'nombre_producto' => 'Cojìn MUGARA',
                'descripcion' => 'Diseño Kenzo Takada
\\n
\\nCojìn Cuadrado en terciopelo liso MUGARA 70.
\\n
\\nDisponible en varios colores',
                'precio' => '100',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 2,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'cojin-mugara',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            58 => 
            array (
                'id' => 59,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete FLUTE',
                'descripcion' => 'Alfombra anudada a mano en 90% lana de Nueva Zelanda y 10% algodón. Otras dimensiones disponibles.
\\n
\\nAlto 250 x Largo 350 cm',
                'precio' => '2500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-flute',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            59 => 
            array (
                'id' => 60,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete SQUARED',
                'descripcion' => 'Alfombra anudada a mano en 100% lana. Otras medidas disponibles.
\\n
\\nAlto 300 x Largo 350 cm',
                'precio' => '2700',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-squared',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            60 => 
            array (
                'id' => 61,
                'category_id' => 11,
                'subcategory_id' => 0,
                'nombre_producto' => 'Cojìn LINOSA Beige',
                'descripcion' => 'Fusiòn de cuadros en lino bicolor con vivo y bordado en contraste.
\\n
\\n40 x 40 cm
\\n
\\nDisponible en varios colores',
                'precio' => '200',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'cojin-linosa-beige',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            61 => 
            array (
                'id' => 62,
                'category_id' => 11,
                'subcategory_id' => 0,
                'nombre_producto' => 'Cojìn LINOSA Camel',
                'descripcion' => 'Fusiòn de cuadros en lino bicolor con vivo y bordado en contraste. Otros colores disponibles.
\\n
\\n40 x 40 cm',
                'precio' => '200',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'cojin-linosa-camel',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            62 => 
            array (
                'id' => 63,
                'category_id' => 8,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sofà ORIGINEL 3 Plazas',
                'descripcion' => 'Diseñador: Maurizio Manzoni
\\n
\\nTapizado en tela Moorea (100% acrílico). Respaldos regulables, mecanismo de fundición de aluminio lacado en negro mate. Estructura de abeto macizo, contrachapado de pino y metal. Base de metal barnizado negro mate.',
                'precio' => '3990',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sofa-originel-3-plazas',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            63 => 
            array (
                'id' => 64,
                'category_id' => 8,
                'subcategory_id' => NULL,
                'nombre_producto' => 'Sofà BLOGGER 3',
            'descripcion' => '<div>Diseñador: R. Tapinassi &amp; M Manzoni<br><br>Mezcla inteligente de loa años 70 y 2000, la modernidad del sofà no compromete su suavidad o comodidad.<br><br>Su tela de felpa (acertadamente llamada Câlin – «abrazo» en francés) resume mejor su características clave. Líneas redondeadas y suaves mechones para invocar una generosa cantidad de crema que encapsula la indiferencia relajada.&nbsp;<br><br></div>',
                'precio' => '3490.00',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => NULL,
                'oportunidad_unica' => 0,
                'home_office' => NULL,
                'coleccion_pertenece' => NULL,
                'imagen_destacada' => 'uploads/productos/sofa-blogger-3/bZJbdElvShK4a5MHSrCtR5p9R0J8JxJuLIoHdNJ4.jpg',
                'galeria' => '["uploads\\/productos\\/sofa-blogger-3\\/TfnQi6ITnqZm7NYXp6au8wyguVlEKGWxXF3maQ4g.jpg","uploads\\/productos\\/sofa-blogger-3\\/05AS89iG5OZkphgfQHiLvdFuN2H73ShP7Uuyd6hU.jpg","uploads\\/productos\\/sofa-blogger-3\\/yMjZ6wRZGUsQ9upedaJKHcy8SsilLJqAR9cfjEWx.jpg","uploads\\/productos\\/sofa-blogger-3\\/klOcEZ9A252T2Bjgqa9n0WKio4ogwb1qYGqSDSSo.jpg","uploads\\/productos\\/sofa-blogger-3\\/sELjTY0ElQOE40Z0GHAr49h3ou0DZFotjudkaquA.jpg","uploads\\/productos\\/sofa-blogger-3\\/uKE99bQB7mCJ1z3tcDreKZsHm6OsVYP3YIaAgW5t.jpg","uploads\\/productos\\/sofa-blogger-3\\/PYRtmAv1lbsA0RNpsLNEroSK24qgQvjXCbEbl80w.jpg","uploads\\/productos\\/sofa-blogger-3\\/Wplz4olEW0dYTcA92dGvbpep7OcBCCWcXjDuT26C.jpg","uploads\\/productos\\/sofa-blogger-3\\/5GlOjAtDUVUd6CSdjNk5FCDFCspO7iVl592X9etX.jpg"]',
                'slug' => 'sofa-blogger-3',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 05:19:43',
            ),
            64 => 
            array (
                'id' => 65,
                'category_id' => 8,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sofà OCTOVA',
                'descripcion' => 'Diseño: Studio Roche Bobois
\\n
\\nTapizado en tejido Ondèa capitonè y tejido Ondèa liso. Cojines de respaldo de làtex, espuma HR y fibra. Estructura de abeto macizo, contrachapado de pino y tablero de partículas. Base de metal con acabado Black Nickel. Puf tapizado en tela Abstract.
\\n
\\n&nbsp;',
                'precio' => '10835',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sofa-octova',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            65 => 
            array (
                'id' => 66,
                'category_id' => 8,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sofà ESSENTIEL Composición de Esquinas',
                'descripcion' => 'Diseñador: Philippe Bouix
\\n
\\nElegancia y confort incomparable caracterizan al modelo ESSENTIEL. Su estructura de madera vista destaca una silueta fina y esbelta. Una gran superficie de asiento suave y acogedora, pequeños reposabrazos delgados y poca profundidad lo convierten en un modelo tan refinado como cómodo.',
                'precio' => '7590',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sofa-essentiel-composicion-de-esquinas',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            66 => 
            array (
                'id' => 67,
                'category_id' => 8,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sofà ORIGINEL Angle',
                'descripcion' => 'Diseñador: Maurizio Manzoni
\\n
\\nTapizado en tela Moorea (100% acrílico). Respaldos regulables, mecanismo de fundición de aluminio lacado en negro mate. Estructura de abeto macizo, contrachapado de pino y metal. Base de metal barnizado negro mate
\\n
\\n&nbsp;',
                'precio' => '7590',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sofa-originel-angle',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            67 => 
            array (
                'id' => 68,
                'category_id' => 7,
                'subcategory_id' => 0,
                'nombre_producto' => 'Cama EN-TETÊ',
                'descripcion' => 'Diseñador: Studio Roche Bobois
\\n
\\nUna cama moderna con sus dos almohadones en cabecera, que fomentan el aislamiento. Tapizado en tela Belice, es completamente desenfundable.',
                'precio' => '4270',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'cama-en-tete',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            68 => 
            array (
                'id' => 69,
                'category_id' => 7,
                'subcategory_id' => 0,
                'nombre_producto' => 'Cama EDEN-ROCK',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nLa cama es la expresión de un hábil trabajo de acoquinamiento en todo su perímetro, retomando el tema vertical de la colección Eden-Rock.',
                'precio' => '4790',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'cama-eden-rock',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            69 => 
            array (
                'id' => 70,
                'category_id' => 7,
                'subcategory_id' => 0,
                'nombre_producto' => 'Cama CONTRE JOUR',
                'descripcion' => 'Diseñador: Studio Roche Bobois
\\n
\\nUna cama moderna con un aire grand siecle que le dan sus dos vueltas laterales: nada mejor para acurrucarse en los rincones, apoyándose tiernamente en el acogedor revestimiento de tela Ondèa.',
                'precio' => '3300',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'cama-contre-jour',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            70 => 
            array (
                'id' => 71,
                'category_id' => 1,
                'subcategory_id' => 0,
                'nombre_producto' => 'Mesa de Comedor ASTROLAB 2.0',
                'descripcion' => 'Diseñador: Studio Roche Bobois
\\n
\\nEl tema de la mecánica desvelada es la esencia de Astrolab 2.0, acabado chámpale, cálido y precioso, es una metàfora de las elegantes carátulas de los años 50. Usar el control remoto para desplegar la extensión y recibir más invitados.',
                'precio' => '10780',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'mesa-de-comedor-astrolab-2-0',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            71 => 
            array (
                'id' => 72,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn EDEN-ROCK Conversaciòn',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nEstructura de contrachapado macizo de pino y chopo con pátina Dècorateur color castaño. Base de haya con patas de latón y bandeja de cerezo macizo teñido Toffee.
\\n
\\nTapizado en tela Orsetto.',
                'precio' => '3000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-eden-rock-conversacion',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            72 => 
            array (
                'id' => 73,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn FOLK',
                'descripcion' => 'Diseñador: Stefan Heiliger
\\n
\\nSillòn tapizado en Dune liso y estampado. Asiento y respaldo acojinados rellenos de espuma. Estructura de madera maciza de abeto, contrachapado de pino y madera compuesta de ingeniería (madera CARB). Base giratoria de metal cromado con función de retorno automático y memoria de posición',
                'precio' => '2360',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-folk',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            73 => 
            array (
                'id' => 74,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn ARCHIPEL',
                'descripcion' => 'Diseñador: Antoine Fritsch &amp; Vivien Durisotti
\\n
\\nEstructura de haya maciza con acabado patinado en color castor. Respaldo de espuma, asiento con correas de espuma. Tapizado en tela Kinmel  FDG 3006-03 Quercus, acabado con pespuntes.',
                'precio' => '2800',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-archipel',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            74 => 
            array (
                'id' => 75,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sofà MEDIANE',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nTapizado en tela Orsetto Flex (33% viscosa, 29% acrilico, 15% lana, 8% algodòn, 7% poliestere, 6% lino, 1% poliamida, 1% elastano). Asiento y respaldo en espuma de poliuretano y fibras de poliéster. Estructura de contrachapado macizo de abeto y pino.
\\n
\\nBase de metal con acabado Vintage Bronze Mate.',
                'precio' => '2430',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sofa-mediane',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            75 => 
            array (
                'id' => 76,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn MEDIANE',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nTapizado en tela Orsetto Flex (33% viscosa, 29% acrilico, 15% lana, 8% algodòn, 7% polièster, 6% lino, 1% poliamida, 1% elastano). Asiento y respaldo en espuma de poliuretano y fibras de poliéster. Estructura en contrachapado macizo de abeto y pino.
\\n
\\nBase de metal con acabado Vintage Bronze mate.',
                'precio' => '1790',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-mediane',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            76 => 
            array (
                'id' => 77,
                'category_id' => 8,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sofà PARCOURS',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nUn sofà tan elegante por delante como por detrás, completamente acojinado y acompañado de cojines decorativos con motivos muy \'couture\'.
\\n
\\nPoco profundo, este modelo ofrece un espacio mínimo que le permite caber en espacios pequeños.',
                'precio' => '6950',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sofa-parcours',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            77 => 
            array (
                'id' => 78,
                'category_id' => 7,
                'subcategory_id' => 0,
                'nombre_producto' => 'Cama BUBBLE 2',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nNo, no es una nube, sino una cama envolvente de formas regordetas, prima de sus mayores, los sofás Bubble y otros sillones. Como todos los miembros de su familia, emana comodidad e inspira el sueño.',
                'precio' => '6110',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'cama-bubble-2',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            78 => 
            array (
                'id' => 79,
                'category_id' => 8,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sofà BUBBLE 2',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nBubble expresa el equilibrio entre innovación, desempeño y emoción. Inspirada en formas naturales y minerales y totalmente artesanal, su diseño requirió el desarrollo de tejidos elásticos específicos que se adaptan perfectamente a sus formas redondeadas. Con su estilo único, el sofà Bubble, es un modelo icónico en las colecciones de Roche Bobois.
\\n
\\n&nbsp;',
                'precio' => '4490',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sofa-bubble-2',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            79 => 
            array (
                'id' => 80,
                'category_id' => 1,
                'subcategory_id' => 0,
                'nombre_producto' => 'Mesa de Comedor VOILES',
                'descripcion' => 'Diseñador: Maurice Barilone
\\n
\\nTres meses de investigación en taller fueron necesarios para que ek diseñador-escultor Maurice Barilone obtuviera las forma aéreas de ese conjunto de láminas curvas que componen la base. La belleza de estas piezas es el efecto de ligereza asociado al grueso metal, sublimado por los reflejos de los galvanizados metálicos (oro, cobre, cromo o black niquel) o en los sublimes colores cromados.',
                'precio' => '6170',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'mesa-de-comedor-voiles',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            80 => 
            array (
                'id' => 81,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn AIRCELL',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nPuedes ver un capullo de flor o el asiento de una nave espacial futurista... AIRCELL es un sillón que encuentra su lugar en todos los universos de la decoración. Giratorio, se fija sobre un pie giratorio llamado "circline" que le permite girar suavemente y volver automáticamente a su posición inicial.',
                'precio' => '2018',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-aircell',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            81 => 
            array (
                'id' => 82,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn CURL',
                'descripcion' => 'Diseñador: Roberto Tapinassi &amp; Maurizio Manzoni
\\n
\\nSillòn giratorio, redondeado y envolvente.
\\n
\\nSe adapta con mucha naturalidad a todos los interiores como una cómoda puntuación gráfica.',
                'precio' => '2570',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-curl',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            82 => 
            array (
                'id' => 83,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn DOT',
                'descripcion' => 'Diseñador : Raphael Navot
\\n
\\nÙn sillòn esférico que envuelve y reconforta de inmediato. Giratorio, esta forrado con una tela elástica muy gruesa.
\\n
\\n&nbsp;',
                'precio' => '2010',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-dot',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            83 => 
            array (
                'id' => 84,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn EDEN-ROCK Lounge',
                'descripcion' => 'Diseñador : Sacha Lakic
\\n
\\nVestida de tela. Estructura de pino macizo y contrachapado de chopo. Base de cerezo macizo teñido.',
                'precio' => '2500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-eden-rock-lounge',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            84 => 
            array (
                'id' => 85,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn EDITO Lounge',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nCon un diseño atrevido, la ergonomìa del sillón Edito Lounge ha sido estudiada al detalle para ofrecer un confort nuevo y muy original: todo el cuerpo se mantiene en una posición de perfecta relajación, el amplio reposacabezas se adapta perfectamente a la cabeza.',
                'precio' => '2430',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-edito-lounge',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            85 => 
            array (
                'id' => 86,
                'category_id' => 6,
                'subcategory_id' => 0,
                'nombre_producto' => 'Pouf PARCOURS',
                'descripcion' => 'Diseñador: Sacha Lakic',
                'precio' => '2180',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'pouf-parcours',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            86 => 
            array (
                'id' => 87,
                'category_id' => 6,
                'subcategory_id' => 0,
                'nombre_producto' => 'Pouf ORIGINEL',
                'descripcion' => 'Diseñador: Maurizio Manzoni',
                'precio' => '2500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'pouf-originel',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            87 => 
            array (
                'id' => 88,
                'category_id' => 6,
                'subcategory_id' => 0,
                'nombre_producto' => 'Pouf OCTOVA',
                'descripcion' => 'Diseñador: Studio Roche Bobois',
                'precio' => '1700',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'pouf-octova',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            88 => 
            array (
                'id' => 89,
                'category_id' => 6,
                'subcategory_id' => 0,
                'nombre_producto' => 'Pouf ESSENTIEL',
                'descripcion' => 'Diseñador: Philippe Bouix',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'pouf-essentiel',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            89 => 
            array (
                'id' => 90,
                'category_id' => 9,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sofà ESSENTIEL',
                'descripcion' => 'Diseñador: Philippe Bouix
\\n
\\nElegancia y confort incomparable caracterizan al modelo ESSENTIEL. Su estructura de madera vista destaca una silueta fina y esbelta. Una gran superficie de asiento suave y acogedora, pequeños reposabrazos delgados y poca profundidad lo convierten en un modelo tan refinado como cómodo.',
                'precio' => '4000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sofa-essentiel',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            90 => 
            array (
                'id' => 91,
                'category_id' => 6,
                'subcategory_id' => 0,
                'nombre_producto' => 'Pouf ESSENTIEL1',
                'descripcion' => 'Diseñador: Philippe Bouix',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'pouf-essentiel1',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            91 => 
            array (
                'id' => 92,
                'category_id' => 6,
                'subcategory_id' => 0,
                'nombre_producto' => 'Pouf PARROT',
                'descripcion' => 'Diseñador: Raphael Navot',
                'precio' => '650',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'pouf-parrot',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            92 => 
            array (
                'id' => 93,
                'category_id' => 6,
                'subcategory_id' => 0,
                'nombre_producto' => 'Pouf MACARON',
                'descripcion' => 'Diseñador: Stefan Heiliger
\\n
\\nUna losa tallada en el asiento se convierte en respaldo: según la inclinación y la orientación que se le dè, el objeto se convierte en sillón, meridiano, tumbona o ... parque infantil',
                'precio' => '2640',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'pouf-macaron',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            93 => 
            array (
                'id' => 94,
                'category_id' => 13,
                'subcategory_id' => 0,
                'nombre_producto' => 'Mesa de Centro NENUPHAR',
                'descripcion' => 'Diseñador: Efrem Bonacina &amp; Greta Macri
\\n
\\nSerie de mesas con sobre biselado en màrmol blanco Carrara o mármol Gris Alpino con base trípode en acero lacado gris o negro',
                'precio' => '1700',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'mesa-de-centro-nenuphar',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            94 => 
            array (
                'id' => 95,
                'category_id' => 13,
                'subcategory_id' => 0,
                'nombre_producto' => 'Mesa de Centro SILVER TREE BOSSA',
                'descripcion' => 'Diseñador: Wood &amp; Cane Design
\\n
\\nSilver Tree Bossa se inspira en la forma del tronco de un árbol. La colección está realizada en fundición de aluminio, lo que le confiere un aspecto brutaliza de los materiales nobles. Su superficie rugosa evoca la vibración del agua hirviendo.',
                'precio' => '1630',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'mesa-de-centro-silver-tree-bossa',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            95 => 
            array (
                'id' => 96,
                'category_id' => 13,
                'subcategory_id' => 0,
                'nombre_producto' => 'Mesa de Centro WINCH',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nEstructuras cónicas de madera maciza, líneas aerodinámicas, la Colección Winch está inspirada en los hermosos veleros de la dècada de 1950. Cada detalle muestra un trabajo de alto nivel.',
                'precio' => '1100',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'mesa-de-centro-winch',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            96 => 
            array (
                'id' => 97,
                'category_id' => 13,
                'subcategory_id' => 0,
                'nombre_producto' => 'Mesa de Centro WINCH Cristal',
                'descripcion' => 'Diseñador: Sacha Lakic',
                'precio' => '970',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'mesa-de-centro-winch-cristal',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            97 => 
            array (
                'id' => 98,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete ARCHITRAVE',
                'descripcion' => 'Alfombra tejida a mano en 60% lana de Nueva Zelanda y 40% Tencel.
\\n
\\nDisponible en otras dimensiones.
\\n
\\nAlto 270 x Ancho 380 cm',
                'precio' => '2700',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-architrave',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            98 => 
            array (
                'id' => 99,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete INFINITY',
                'descripcion' => 'Alfombra tufting en 75% lana y 25% seda vegetal, acabada a mano.
\\n
\\nAlto 250 x Ancho 350 cm
\\n
\\nDisponible en otras dimensiones.
\\n
\\n&nbsp;',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-infinity',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            99 => 
            array (
                'id' => 100,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete SAGOMA',
                'descripcion' => 'Alfombre tejida a mano en 100% lana.
\\n
\\nAlto 250 x Ancho 350 cm
\\n
\\nDisponible en otras dimensiones.',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-sagoma',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            100 => 
            array (
                'id' => 101,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete EVENTAIL',
                'descripcion' => 'Alfombra anudada a mano en 70% lana y 30% seda vegetal
\\n
\\nAlto 250 x Ancho 350
\\n
\\nDisponible en otras dimensiones',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-eventail',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            101 => 
            array (
                'id' => 102,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete FIELD',
                'descripcion' => 'Alfombra anudada a mano en 90% lana Nueva Zelanda y 10% algodòn.
\\n
\\nAlto 250 x Ancho 350
\\n
\\nDisponible en otras dimensiones',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-field',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            102 => 
            array (
                'id' => 103,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete MAILLON Terre',
                'descripcion' => 'Alfombra anudada a mano en 60% lana y 40% seda vegetal.
\\n
\\nAlto 250 x Ancho 350 cm
\\n
\\nDisponible en otras dimensiones.',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-maillon-terre',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            103 => 
            array (
                'id' => 104,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete EQUINOXE',
                'descripcion' => 'Diseñador: Elizabeth Leriche
\\n
\\nAlfombra anudada a mano 100% lana Nueva Zelanda
\\n
\\nVersiòn rectangular',
                'precio' => '2500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-equinoxe',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            104 => 
            array (
                'id' => 105,
                'category_id' => 5,
                'subcategory_id' => 0,
                'nombre_producto' => 'Làmpara de Pie UNFOLD',
                'descripcion' => 'Diseñador: Alexandre Dubreuil
\\n
\\nLàmpara de pie en acero lacado negro y base negra, tres reflectores de tela plisada a mano.',
                'precio' => '2500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'lampara-de-pie-unfold',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            105 => 
            array (
                'id' => 106,
                'category_id' => 5,
                'subcategory_id' => 0,
                'nombre_producto' => 'Làmpara de Pie ANNAPURNA',
                'descripcion' => 'Diseñador: Fabrice Berrux
\\n
\\nLàmpara de pie con base de yeso gris mate y estructura de acero. Difusor de cinta textil marfil.',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'lampara-de-pie-annapurna',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            106 => 
            array (
                'id' => 107,
                'category_id' => 5,
                'subcategory_id' => 0,
                'nombre_producto' => 'Làmpara de Pie NONETTE',
                'descripcion' => 'Diseñador: Cèdric Ragot
\\n
\\nInspirada en un recuerdo de la infancia, la Colección Nonette de Cèdric Ragot està disponible como lámpara de pie y lámpara de mesa.
\\n
\\nLas proporciones de la lámpara de pie recuerdan la silueta de una monja que lleva su corneta, que se convierte en un difusor de luz, mientras que la Nonette que se posa evoca el único velo.',
                'precio' => '1330',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'lampara-de-pie-nonette',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            107 => 
            array (
                'id' => 108,
                'category_id' => 5,
                'subcategory_id' => 0,
                'nombre_producto' => 'Lámpara de Pie VIS A VIS',
                'descripcion' => 'Diseñador: Sophie Larger
\\n
\\nLàmpara de pie y de lectura con estructura de metal acabado lacado satinado grafito. Base y difusores en metal, color Aguamarina. Interruptor táctil independiente en las barras metálicas para el difusor principal y la lámpara de lectura, con dimmer. Difusor gira sobre un eje horizontal. LED integrado.',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'lampara-de-pie-vis-a-vis',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            108 => 
            array (
                'id' => 109,
                'category_id' => 5,
                'subcategory_id' => 0,
                'nombre_producto' => 'Làmpara de Pie ACCASTILLAGE',
                'descripcion' => 'Diseñador: Marianne Guedin
\\n<div class="page" title="Page 7">
\\n<div class="section">
\\n<div class="layoutArea">
\\n<div class="column">
\\n
\\nLàmpara de pie con estructura en madera de tulipán de negro y globo de cristal soplado. Pata en acero inoxidable cepillado. Bombilla E27.
\\n
\\nDisponible en otro colores
\\n
\\n</div>
\\n</div>
\\n</div>
\\n</div>',
                'precio' => '2610',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 3,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'lampara-de-pie-accastillage',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            109 => 
            array (
                'id' => 110,
                'category_id' => 5,
                'subcategory_id' => 0,
                'nombre_producto' => 'Làmpara de Pie NOMADE',
                'descripcion' => '<div class="page" title="Page 8">
\\n<div class="section">
\\n<div class="layoutArea">
\\n<div class="column">
\\n<div class="page" title="Page 8">
\\n<div class="section">
\\n<div class="layoutArea">
\\n<div class="column">
\\n
\\nDiseñador : Alessio Bassan
\\n
\\nLàmpara de pie con brazos orientables en aluminio lacado y pata en acero lacado negro. LED integrado.
\\n
\\n</div>
\\n</div>
\\n</div>
\\n</div>
\\n</div>
\\n</div>
\\n</div>
\\n</div>',
                'precio' => NULL,
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 3,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'lampara-de-pie-nomade',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            110 => 
            array (
                'id' => 111,
                'category_id' => 5,
                'subcategory_id' => 0,
                'nombre_producto' => 'Làmpara de Pie FLEUR DE COTON',
                'descripcion' => 'Diseñador: Alessio Bassan
\\n
\\nFleur de Coton, diseñado por Alessio Bassan, recuerda el tallo de la flor de algodòn que se dobla suavemente con el viento mientras crea una luz que es a la vez delicada e intensa. Disponible en suspensión, lámpara de pie recta y làmpara de lectura.',
                'precio' => '2250',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 3,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'lampara-de-pie-fleur-de-coton',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            111 => 
            array (
                'id' => 112,
                'category_id' => 2,
                'subcategory_id' => 0,
                'nombre_producto' => 'Jarrones TRIBU',
                'descripcion' => 'Diseñador: Aurélie Richard
\\n
\\nJarrones de ceràmica esmaltada',
                'precio' => '700',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 4,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'jarrones-tribu',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            112 => 
            array (
                'id' => 113,
                'category_id' => 2,
                'subcategory_id' => 0,
                'nombre_producto' => 'Jarrones ASIA',
                'descripcion' => 'Diseñador: Sophie Larger
\\n
\\nAsia es una colección de jarrones de cerámica diseñada por Sophie Larger. Ella lo diseño como un arquetipo muy simple, perforado en ambos lados para acomodar una barra de madera.',
                'precio' => '330',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 4,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'jarrones-asia',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            113 => 
            array (
                'id' => 114,
                'category_id' => 2,
                'subcategory_id' => 0,
                'nombre_producto' => 'Jarrones TRIADE',
                'descripcion' => 'Jarrones de cristal de Murano soplado artesanalmente',
                'precio' => '610',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 4,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'jarrones-triade',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            114 => 
            array (
                'id' => 115,
                'category_id' => 2,
                'subcategory_id' => 0,
                'nombre_producto' => 'Escultura BALOON',
                'descripcion' => 'Objeto de cristal de Murano soplado a boca',
                'precio' => NULL,
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 4,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'escultura-baloon',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            115 => 
            array (
                'id' => 116,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete FUYOU-YASHI',
                'descripcion' => 'Diseñador: Kenzo Takada
\\n
\\nAlfombra tuftada a mano en 60% lana de Nueva Zelanda y 40% seda vegetal, estampado de palmera dorada sobre fondo sombreado. Patrones grabados a mano.
\\n
\\nAlto 250 x Largo 250 cm',
                'precio' => '3790',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 4,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-fuyou-yashi',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            116 => 
            array (
                'id' => 117,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete GARA-JUUTAN',
                'descripcion' => 'Diseño Kenzo Takada
\\n
\\nAlfombra tejida a mano, lana virgen de Nueva Zelanda.',
                'precio' => '2900',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 1,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-gara-juutan',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            117 => 
            array (
                'id' => 118,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete EQUINOXE',
                'descripcion' => 'Diseñador: Elisabeth Leriche
\\n
\\nAlfombra anudada a mano en 100% lana de Nueva Zelanda.
\\n
\\n&nbsp;
\\n
\\n&nbsp;',
                'precio' => '3590',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 1,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-equinoxe',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            118 => 
            array (
                'id' => 119,
                'category_id' => 10,
                'subcategory_id' => 0,
                'nombre_producto' => 'Tapete MARCO',
                'descripcion' => 'Un efecto "baldosa de cemento" y una reintepretaciòn del terraza conforman esta alfombra que combina un aspecto mineral y gráfico con un espíritu muy contemporáneo.
\\n
\\nAlfombra anudada a mano en 85% lana de Nueva Zelanda y 15% seda vegetal',
                'precio' => '2500',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 1,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'tapete-marco',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            119 => 
            array (
                'id' => 120,
                'category_id' => 11,
                'subcategory_id' => 0,
                'nombre_producto' => 'Cojìn HANAGAME',
                'descripcion' => 'Diseño Kenzo Takada
\\n
\\nCojìn rectangular formado por dos parches de tejido jacquard Hanawa 156 y Game 156, separados por una trenza.',
                'precio' => '90',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 2,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'cojin-hanagame',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            120 => 
            array (
                'id' => 121,
                'category_id' => 11,
                'subcategory_id' => 0,
                'nombre_producto' => 'Cojìn SHARK BAY',
                'descripcion' => 'Diseñador: Yaan Arthus Bertrand
\\n
\\nCojìn en gamuza con ribete 100% poliéster.
\\n
\\nEn colaboración con el fotógrafo Yann Arthur-Bertrand, Roche Bobois ofrece una colección de tres cojines que transcriben fotografías tomadas desde el cielo. El cojín Shark Bay representa una vista de los bancos de arena en la bahía desde Haridon Bight, Península de Peron, Australia.',
                'precio' => '180',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 2,
                'oportunidad_unica' => 0,
                'home_office' => 0,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'cojin-shark-bay',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            121 => 
            array (
                'id' => 122,
                'category_id' => 3,
                'subcategory_id' => 0,
                'nombre_producto' => 'Escritorio FURTIF',
                'descripcion' => 'Diseñador: Daniel Rode
\\n
\\nSobre el principio de los aviones de caza escapando a los radares. Daniel Rode ha diseñado Furtif para intentar escapar a las leyes de la gravedad por la proeza de un voladizo espectacular y la elegancia prismática de las formas triangulares.',
                'precio' => NULL,
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 2,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'escritorio-furtif',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            122 => 
            array (
                'id' => 123,
                'category_id' => 3,
                'subcategory_id' => 0,
                'nombre_producto' => 'Escritorio CALLIGRAPHIE',
                'descripcion' => 'Diseñador: Julien Vidame
\\n
\\nComo hoja de madera plegada y doblada sobre sì misma en los cuatro lados, Calligraphie es un origami flexible y orgánico colocado delicadamente sobre delgadas patas. En los intersticios negros de esta gran nuez se levantan dos lapiceros, uno delante y el otro a la derecha.',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 2,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'escritorio-calligraphie',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            123 => 
            array (
                'id' => 124,
                'category_id' => 3,
                'subcategory_id' => 0,
                'nombre_producto' => 'Escritorio PARK LANE',
                'descripcion' => 'Diseño 490
\\n
\\nSobre en multilaminado Tilia tintado (2 tonos), con accesorios eléctricos (enchufe USB, cargador wireless, cable eléctrico exterior de las patas con certificación eléctrica), y soporte para móvil. Patas de sicomoro macizo y tiradores de latòn y sicomoro. 2 cajones.',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 2,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'escritorio-park-lane',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            124 => 
            array (
                'id' => 125,
                'category_id' => 3,
                'subcategory_id' => 0,
                'nombre_producto' => 'Escritorio RIO IPANEMA',
                'descripcion' => 'Diseñador: Bruno Moinard
\\n
\\nSobre de MDF chapado en roble, sobre de piel Caresse (varios colores), estructura superior y pase de roble macizo.',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 2,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'escritorio-rio-ipanema',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            125 => 
            array (
                'id' => 126,
                'category_id' => 3,
                'subcategory_id' => 0,
                'nombre_producto' => 'Escritorio MORPHOS',
                'descripcion' => 'Diseñador: Daniel Rode
\\n
\\nEl diseñador Daniel Rode es un adepto de las forms complejas y de los materiales dúctiles que permiten realizarlas. Con Morphos, ha creado un escritorio futurista y acogedor: sus curvas lo convierten en un objeto escultural casi autónomo que encuentra su lugar tanto en la casa como el universo profesional.',
                'precio' => '2000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 1,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 2,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'escritorio-morphos',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            126 => 
            array (
                'id' => 127,
                'category_id' => 12,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillón FURTIF',
                'descripcion' => 'Diseñador: Daniel Rode
\\n
\\nSillòn giratorio sobre ruedas recubierto de piel o tela tecnológica aspecto piel. Altura del asiento regulable de 59 a 70 cm. Altura máxima 90 cm.',
                'precio' => '1000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-furtif',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            127 => 
            array (
                'id' => 128,
                'category_id' => 12,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn CEO',
                'descripcion' => 'Diseñador Sacha Lakic
\\n
\\nRevestido en tela.
\\n
\\nAsiento y respaldo espuma y fibras. Estructura abeto macizo y multilaminado de pino. Base de metal cromado brillante o fundición de aluminio negro.',
                'precio' => '1000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-ceo',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            128 => 
            array (
                'id' => 129,
                'category_id' => 12,
                'subcategory_id' => 0,
                'nombre_producto' => 'Silla ARUM',
                'descripcion' => 'Diseñador Sacha Lakic
\\n
\\nEl principio de esta silla es una línea continua, que parte de la base, continua en una sola pata y se extiende hasta un borde dorsal en el centro del respaldo. Su estilo dinámico es representativo de su diseñador, Sacha Lakic.',
                'precio' => '1000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'silla-arum',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            129 => 
            array (
                'id' => 130,
                'category_id' => 12,
                'subcategory_id' => 0,
                'nombre_producto' => 'Silla COLETTE',
                'descripcion' => 'Diseño Studio Giofra
\\n
\\nEstructura en multipliegues de álamo y tapizada con acabado Bi o Mono-materia.
\\n
\\nBi-materia: cavidad recubierta de costra de piel en el exterior, y de tela aspecto piel o tela en el interior (numerosos colores disponibles)
\\n
\\nMono-materia: exterior e interior recubierto de tela aspecto piel o tela. Costuras tono sobre tono.
\\n
\\nAcabado 4 patas en acero (expoxi blanco o negro)',
                'precio' => '1000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'silla-colette',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            130 => 
            array (
                'id' => 131,
                'category_id' => 12,
                'subcategory_id' => 0,
                'nombre_producto' => 'Silla TOURNICOTI',
                'descripcion' => 'Diseñador: Antoine Fritsch &amp; Melique
\\n
\\nLa idea, funcional y original, es la de una silla giratoria que aporta una comodidad: no es necesario levantarla para salir de la mesa.',
                'precio' => '1000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'silla-tournicoti',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
            131 => 
            array (
                'id' => 132,
                'category_id' => 12,
                'subcategory_id' => 0,
                'nombre_producto' => 'Sillòn RDV',
                'descripcion' => 'Diseñador: Sacha Lakic
\\n
\\nRevestido en telas.
\\n
\\nAsiento y respaldo espuma y fibras. Estructura de abeto macizo y multilaminado de pino. Base de metal cromado brillante o fundición de aluminio negro.
\\n
\\nSillòn giratorio regulable en altura 95 cm.',
                'precio' => '1000',
                'precio_descuento' => NULL,
                'mostrar_en_sales' => 0,
                'best_seller' => 0,
                'oportunidad_unica' => 0,
                'home_office' => 1,
                'coleccion_pertenece' => 0,
                'imagen_destacada' => 'https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg',
                'galeria' => '["https://rocheboboismexico.com/wp-content/uploads/2022/05/dy6ZCMjJ_4x.jpg", "https://rocheboboismexico.com/wp-content/uploads/2022/05/Domino_compo_naturelle_focus2.jpg"]',
                'slug' => 'sillon-rdv',
                'created_at' => '2022-10-14 04:12:16',
                'updated_at' => '2022-10-14 04:12:16',
            ),
        ));
        
        
    }
}