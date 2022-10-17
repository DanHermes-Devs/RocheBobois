<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BuildingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('buildings')->delete();
        
        \DB::table('buildings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'categoria_id' => 1,
            'nombre_hotel' => 'Kith Paris_ Boutique Insignia (Paris)',
                'descripcion' => '<div>Ground Floor – Accesorios Lounge<br><br>Espacio Lifestyle dentro de la boutique: Piezas únicas y una selección de libros espectacular hacen que el cliente quiera permanecer horas disfrutando de la sala.</div>',
                'imagen_destacada' => 'uploads/buildings/kith-paris-boutique-insignia-paris/8DsTimYpAslhvM79vyHx8fF3BvrbjiM0EpY7ZpC8.jpg',
                'galeria' => '["uploads\\/buildings\\/kith-paris-boutique-insignia-paris\\/peQTZmZLe5PfOzDRl8uZ3EkUfuOBEYhPstwFMsxP.jpg","uploads\\/buildings\\/kith-paris-boutique-insignia-paris\\/MeOb58M8Q7j80rvLotFTpe0hFP4wQwmPQ2kqfGm0.jpg","uploads\\/buildings\\/kith-paris-boutique-insignia-paris\\/qgODhFpGfwnJ7fMCBLIJrhcsouoC6edteG1sxJag.jpg"]',
                'slug' => 'kith-paris-boutique-insignia-paris',
                'created_at' => '2022-10-17 04:14:56',
                'updated_at' => '2022-10-17 04:14:56',
            ),
            1 => 
            array (
                'id' => 2,
                'categoria_id' => 1,
            'nombre_hotel' => 'Boutique 1966 Couture (Paris)',
                'descripcion' => '<div>Elegancia francesa.<br><br>Rojo pasiòn y un diseño curvado.</div>',
                'imagen_destacada' => 'uploads/buildings/boutique-1966-couture-paris/3zHKXnb3RjBG07z0W2f2hwIiDpQxkSyxgsdi88DM.jpg',
                'galeria' => '["uploads\\/buildings\\/boutique-1966-couture-paris\\/NhOk2SfYebg3cWBEIAjBqaqt2wqNWdbTJpy5RDRF.jpg","uploads\\/buildings\\/boutique-1966-couture-paris\\/j5lvwOod46LVkQamzXzkBaQTwYeb88num3ukQEWt.jpg","uploads\\/buildings\\/boutique-1966-couture-paris\\/JhEx9ukZaNDv5HFUF85vTNxSfwVZ2Y9NLnYDOzLn.jpg","uploads\\/buildings\\/boutique-1966-couture-paris\\/4pwrrhWj3SqP3uspNJhW1ymxXiWwGF7E2BctZADX.jpg","uploads\\/buildings\\/boutique-1966-couture-paris\\/WiwnHHQHe2hqwSh4SFPYNpfQN6TSwwLmtsTqDDVK.jpg"]',
                'slug' => 'boutique-1966-couture-paris',
                'created_at' => '2022-10-17 04:18:20',
                'updated_at' => '2022-10-17 04:18:20',
            ),
            2 => 
            array (
                'id' => 3,
                'categoria_id' => 2,
            'nombre_hotel' => 'Hotel Mandarin Oriental (Munich)',
                'descripcion' => '<div>Disfrute de una vista panorámica de la ciudad desde el Max Jong Roof Garden, mientas degusta un «Mah Jong Spritz» o un «Mah Jong Bowl»</div>',
                'imagen_destacada' => 'uploads/buildings/hotel-mandarin-oriental-munich/GC7pmB2kXzctrLQ6KKEF7G1YKdbrZYrU34AqUvXA.jpg',
                'galeria' => '["uploads\\/buildings\\/hotel-mandarin-oriental-munich\\/jEiSsNfwG6NH4wzirRJWsMOwYvmkPqEejnplkDYa.png","uploads\\/buildings\\/hotel-mandarin-oriental-munich\\/b7vyS3G24Uv0PSln6D5HN5xCZQymwrsfF3IO6DhF.jpg","uploads\\/buildings\\/hotel-mandarin-oriental-munich\\/o7lNikjoulY53zLZ5MYJRs1M9Sec5wXJ2pzOcHup.jpg"]',
                'slug' => 'hotel-mandarin-oriental-munich',
                'created_at' => '2022-10-17 04:20:03',
                'updated_at' => '2022-10-17 04:20:03',
            ),
            3 => 
            array (
                'id' => 4,
                'categoria_id' => 2,
            'nombre_hotel' => 'Hotel Kurhotel (Ciudad Bad Füssing, Baviera)',
                'descripcion' => '<div>Roche Bobois diseñó el mobiliario y la decoración de todas las suites y habitaciones del hotel, así como el lobby y restaurante de este Hotel Boutique.</div>',
                'imagen_destacada' => 'uploads/buildings/hotel-kurhotel-ciudad-bad-fussing-baviera/6vk7XvDocqODR2n2twTddUxVG62hZ0cQbL8jzCgF.jpg',
                'galeria' => '["uploads\\/buildings\\/hotel-kurhotel-ciudad-bad-fussing-baviera\\/2kmV1IC6HY4QzmHcOhKQreE1NWP4ICvQcYgF9Gji.jpg","uploads\\/buildings\\/hotel-kurhotel-ciudad-bad-fussing-baviera\\/xrG3PCynbRdet8xGjrHvTx7ayrk7NOxwDis64mv3.jpg","uploads\\/buildings\\/hotel-kurhotel-ciudad-bad-fussing-baviera\\/KH3hQJ61FUeDnE0bTfnAz5X2kBET5l4XcHGSTmoh.jpg","uploads\\/buildings\\/hotel-kurhotel-ciudad-bad-fussing-baviera\\/4sfz0DNPwG0nRmkuCGozxSTVYKqdKnwH6LjEDghZ.jpg","uploads\\/buildings\\/hotel-kurhotel-ciudad-bad-fussing-baviera\\/8nY8u3YTiBOJ2UnLJPHJ06E4LrGG4817nXJJW5qx.jpg","uploads\\/buildings\\/hotel-kurhotel-ciudad-bad-fussing-baviera\\/xcpP7uUnOBRb1M60goi20kEwW9b9pA2QyvYMBjdz.jpg","uploads\\/buildings\\/hotel-kurhotel-ciudad-bad-fussing-baviera\\/T0N5wWGU1lTruECgCgpEyvKrx69wBYQEd8gmlBn9.jpg"]',
                'slug' => 'hotel-kurhotel-ciudad-bad-fussing-baviera',
                'created_at' => '2022-10-17 04:21:23',
                'updated_at' => '2022-10-17 04:21:23',
            ),
            4 => 
            array (
                'id' => 5,
                'categoria_id' => 2,
                'nombre_hotel' => 'Hotel Langham Place, New York',
                'descripcion' => '<div>Dos suites ambientadas en estilo Roche Bobois de 1,900 pies cuadrados, situadas en dos de los pisos más altos del hotel: suite 2503 y 2603. Vista al ícono del horizonte de Nueva York, el Empire State Building.</div>',
                'imagen_destacada' => 'uploads/buildings/hotel-langham-place-new-york/UBiTsDC5DSmF14TkQQ09K2yB1MyXxZkMm9FU6KGs.png',
                'galeria' => '["uploads\\/buildings\\/hotel-langham-place-new-york\\/QHaD4Hg8m9do9YmzEk9a5RAIIVqTnr9xjIFvd4XA.jpg","uploads\\/buildings\\/hotel-langham-place-new-york\\/d1EdYjVDmb7RdZ7JhEWkeCo8DmckVMlnB6u0BV0z.jpg","uploads\\/buildings\\/hotel-langham-place-new-york\\/9lnG1SSDrt2BR7mc2nNMwYliirmUdps7Go2UzS2A.jpg","uploads\\/buildings\\/hotel-langham-place-new-york\\/5Ghu4B5DDB1ljezzNmU4xt4lGReVV2xRtyOjEIf4.jpg","uploads\\/buildings\\/hotel-langham-place-new-york\\/9VDoLoR6K0LejqUfZ7JqW1AkLqi6wZy7JzWNkHe3.jpg"]',
                'slug' => 'hotel-langham-place-new-york',
                'created_at' => '2022-10-17 04:24:00',
                'updated_at' => '2022-10-17 04:24:00',
            ),
            5 => 
            array (
                'id' => 6,
                'categoria_id' => 2,
                'nombre_hotel' => 'Filter Club, Filadelfia',
                'descripcion' => '<div>El club de estilo de vida privado y muy exclusivo en Filadelfia. Roche Bobois diseño su exquisita Master Suite y aspectos de sus àreas de Bar + Lounge, Comedor y Sala de Proyección.</div>',
                'imagen_destacada' => 'uploads/buildings/filter-club-filadelfia/gXf5vFQe5u2iF8K0fE71616lYqyDp2J6LGZdbzCt.jpg',
                'galeria' => '["uploads\\/buildings\\/filter-club-filadelfia\\/KOdrufIsxIf6oPSdmXuOpnsDRkNAPwSMfvaghz6n.jpg","uploads\\/buildings\\/filter-club-filadelfia\\/Z8gE3pf6GquUrAVGxMxXaXMVXk8K7ejUB1X852zf.jpg","uploads\\/buildings\\/filter-club-filadelfia\\/Rm8JnJKF92Er7ocKL8LgwM9UCgSalEDCmzpHSBub.jpg","uploads\\/buildings\\/filter-club-filadelfia\\/qLaGQRnGRgjkKOhKTgfeDfahuXhLfIrkHZOIw1BF.jpg"]',
                'slug' => 'filter-club-filadelfia',
                'created_at' => '2022-10-17 04:25:00',
                'updated_at' => '2022-10-17 04:25:00',
            ),
            6 => 
            array (
                'id' => 7,
                'categoria_id' => 3,
            'nombre_hotel' => 'Private Jet & Lambo (Dallas)',
                'descripcion' => '<div>Atención inquebrantable en los detalles.<br><br>Maximizar cada minuto del vuelo.</div>',
                'imagen_destacada' => 'uploads/buildings/private-jet-lambo-dallas/tU8BCu7zYCJJBVoiuzHIa6nnkYWJmCllQXblYhee.jpg',
                'galeria' => '["uploads\\/buildings\\/private-jet-lambo-dallas\\/V9MhfORobrMxhP2ZqonmdkzYoNai06OB5oCFP8cL.jpg","uploads\\/buildings\\/private-jet-lambo-dallas\\/UJSjHiByVUKopBmhScQc2KjkyysQYHxBHOlh8sQr.jpg","uploads\\/buildings\\/private-jet-lambo-dallas\\/GuVfqJIjHI7IhuXh0wMMmAksPY0Q4QwySR0Tywh4.jpg"]',
                'slug' => 'private-jet-lambo-dallas',
                'created_at' => '2022-10-17 04:34:46',
                'updated_at' => '2022-10-17 04:34:46',
            ),
            7 => 
            array (
                'id' => 8,
                'categoria_id' => 3,
            'nombre_hotel' => 'Lounge Club Saint Tropez (Francia)',
                'descripcion' => '<div>Lounge Club de la Capitanía de @portsainttropezofficiel, acondicionado por Roche Bobois, una combinación armoniosa de características de lujo.<br><br>Los días evolucionan desde mañanas brillantes y tardes doradas hasta brillantes vistas crepusculares.</div>',
                'imagen_destacada' => 'uploads/buildings/lounge-club-saint-tropez-francia/QIH59XmfOXuehGQy6cddVBQvdgqoOiIjy2zwFQAd.png',
                'galeria' => '["uploads\\/buildings\\/lounge-club-saint-tropez-francia\\/6iKAURfLghGnH0g5klMY1eXjJvgbl9sL1x0pl0GA.jpg","uploads\\/buildings\\/lounge-club-saint-tropez-francia\\/CgQ33R9uAs23lFe7VOGKoo9uZsryxQZHa69aDoKG.jpg","uploads\\/buildings\\/lounge-club-saint-tropez-francia\\/0puj7Q4zA8DWuOsmbyX7ekX3XdMWxFhy38Krpjvf.jpg","uploads\\/buildings\\/lounge-club-saint-tropez-francia\\/fgcfgBznT8Dtmp86SLl1THa97xsvJiAZ738a4ZVq.jpg"]',
                'slug' => 'lounge-club-saint-tropez-francia',
                'created_at' => '2022-10-17 04:36:10',
                'updated_at' => '2022-10-17 04:36:10',
            ),
            8 => 
            array (
                'id' => 9,
                'categoria_id' => 3,
            'nombre_hotel' => 'Lincoln Center (New York)',
                'descripcion' => '<div><em>Sala VIP del Alice Tully Hall del Lincoln Center</em><br><br>Anualmente, se celebra en el otoño, el Festival de Cine de Nueva York.<br><br>Espacio para eventos interior y exterior multifuncional</div>',
                'imagen_destacada' => 'uploads/buildings/lincoln-center-new-york/cklnHiSbJepYz7XXhdq2Whmhp4V9BVAChRQs1nAF.jpg',
                'galeria' => '["uploads\\/buildings\\/lincoln-center-new-york\\/70tp4JzMrZ7DCzzxe46xJnlK4cw5SGhBqqHnCYXZ.jpg","uploads\\/buildings\\/lincoln-center-new-york\\/AbgKVYTKxHJk5MnV4j2N4jSaFA0Zv0FqYmjcmiRA.jpg","uploads\\/buildings\\/lincoln-center-new-york\\/ErhwtBxDYRIyN0MAKl9cFBMkGk5ERw4ov5hncP5D.jpg","uploads\\/buildings\\/lincoln-center-new-york\\/DxzZN0ItuJgMMkNWuzIfftySL3Dd1G8q61l49tCC.jpg","uploads\\/buildings\\/lincoln-center-new-york\\/449einTR4YdZUM59u7ZUYQTT4eskXxUCYnAEDfr2.jpg","uploads\\/buildings\\/lincoln-center-new-york\\/lKbyGSbCOi6zH4W1v4vo4qyaTW5LNAUPe1bigVQ9.jpg"]',
                'slug' => 'lincoln-center-new-york',
                'created_at' => '2022-10-17 04:37:26',
                'updated_at' => '2022-10-17 04:37:26',
            ),
            9 => 
            array (
                'id' => 10,
                'categoria_id' => 3,
                'nombre_hotel' => 'Golf_La Grange du Old Course',
                'descripcion' => NULL,
                'imagen_destacada' => 'uploads/buildings/golf-la-grange-du-old-course/H7rUSgxd8sQlSVBMfxnVVL58wYhquRndoLqFXHb5.png',
                'galeria' => '["uploads\\/buildings\\/golf-la-grange-du-old-course\\/iO9mpjPhWpuHlWkIoCXcly31L8Tim445z5peG3JS.png","uploads\\/buildings\\/golf-la-grange-du-old-course\\/fz0gpUfj7o0Wkw3qFP4cSqvizhypcGsJEXr3nPCs.png","uploads\\/buildings\\/golf-la-grange-du-old-course\\/aH8slpBTIUmpnmonLg6B2QNjGiWg5wL9RjoyQSmp.png","uploads\\/buildings\\/golf-la-grange-du-old-course\\/MckujBoGRCwYjkhK3px2e11Wm5snl7cfyAQWlmG1.png","uploads\\/buildings\\/golf-la-grange-du-old-course\\/mhNMAPQ9o0085PrGAchaf7ed44H4qyeuJ01PYF4i.png"]',
                'slug' => 'golf-la-grange-du-old-course',
                'created_at' => '2022-10-17 04:39:22',
                'updated_at' => '2022-10-17 04:39:22',
            ),
            10 => 
            array (
                'id' => 11,
                'categoria_id' => 3,
                'nombre_hotel' => 'Golf_Evento Privado Francia',
                'descripcion' => '<div>El evento privado de Golf más grande de Francia.</div>',
                'imagen_destacada' => 'uploads/buildings/golf-evento-privado-francia/fYzmJLko37U1SnMpDmWDzeYd40wM8GWXY2tFstpa.png',
                'galeria' => '["uploads\\/buildings\\/golf-evento-privado-francia\\/JfuVBaAu6bqY7Fe3hmPiaXSOmnA0PbhD7IuSl61t.png","uploads\\/buildings\\/golf-evento-privado-francia\\/PQchT1BpjvasUaASu9VT0bSkeHfjDuB4xTSPTbEo.png","uploads\\/buildings\\/golf-evento-privado-francia\\/v6Gpy9yJLeSrEDNCgh6l6g62C2mHCYbdh07iHtFN.png"]',
                'slug' => 'golf-evento-privado-francia',
                'created_at' => '2022-10-17 04:40:48',
                'updated_at' => '2022-10-17 04:40:48',
            ),
            11 => 
            array (
                'id' => 12,
                'categoria_id' => 4,
                'nombre_hotel' => 'Penthouse Residencia, La Cala de Mijas, España',
                'descripcion' => '<div>Roche Bobois vistió con un exquisito sentido del diseño de interiores y exteriores. Una hermosa paleta de tonos y texturas sutiles, complementando el impresionante paisaje de exhuberantes verdes y azules cristalinos.</div>',
                'imagen_destacada' => 'uploads/buildings/penthouse-residencia-la-cala-de-mijas-espana/aoAcvFkYxVWoE1N7L5d1PIXrKKwFirRiG2IcyC6H.jpg',
                'galeria' => '["uploads\\/buildings\\/penthouse-residencia-la-cala-de-mijas-espana\\/U9V25eiXcftsr5LsrT13oQOKnQm7nLUEgvSUxYOj.jpg","uploads\\/buildings\\/penthouse-residencia-la-cala-de-mijas-espana\\/X7Vai84cywIAQTauVuezLwtx6KnDQxaqPf67HXkh.jpg","uploads\\/buildings\\/penthouse-residencia-la-cala-de-mijas-espana\\/J2fShjnFa6KBy0hZkrIgm6I7BJyTYo6ZUNzJYUux.jpg","uploads\\/buildings\\/penthouse-residencia-la-cala-de-mijas-espana\\/OIjmxQROFwjP9XpdGqOoZ7NdzlgdfiVTeNQteB8u.jpg","uploads\\/buildings\\/penthouse-residencia-la-cala-de-mijas-espana\\/7TL0bDkckYmZ6jAUyM48lmvklACQoPnP3Zjl7iZ2.jpg","uploads\\/buildings\\/penthouse-residencia-la-cala-de-mijas-espana\\/omM68Weg5ruHI9a3QNFT5gtwqFt0QDfdVQBJ8SvB.jpg","uploads\\/buildings\\/penthouse-residencia-la-cala-de-mijas-espana\\/Mi7xgslk9w5qdJJuN03FrALdKh9y1E4u3IHjRvoU.jpg","uploads\\/buildings\\/penthouse-residencia-la-cala-de-mijas-espana\\/JWEYFj9CuL1hZEMng4ooDYh6k8ngx0kcuFohpBAu.jpg","uploads\\/buildings\\/penthouse-residencia-la-cala-de-mijas-espana\\/NxwZZiGPufzWDuoonwkvKbb1wuw7BBC1nie4gYIw.jpg","uploads\\/buildings\\/penthouse-residencia-la-cala-de-mijas-espana\\/kUp1xu47STXJrSvLiHRM4nvea0FQFXUIK7Q55jdt.jpg"]',
                'slug' => 'penthouse-residencia-la-cala-de-mijas-espana',
                'created_at' => '2022-10-17 04:42:13',
                'updated_at' => '2022-10-17 04:42:13',
            ),
        ));
        
        
    }
}