<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\frontend\BuildingHController;
use App\Http\Controllers\frontend\ColeccionController;
use App\Http\Controllers\frontend\EventoController;
use App\Http\Controllers\frontend\ShowroomController as FrontendShowroomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShowroomController;
use App\Http\Controllers\SliderController;
use App\Mail\Contacto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Rutas publicas
// Index

Route::get('/', [InicioController::class, 'index'])->name('inicio');

// Showrooms
Route::get('/showrooms', [FrontendShowroomController::class, 'index'])->name('front.showrooms');
Route::get('/showroom/{slug}', [FrontendShowroomController::class, 'show'])->name('front.showrooms.show');

// Contacto
Route::get('/contacto', [InicioController::class, 'contacto'])->name('front.contacto');
Route::post('/contacto', [ContactController::class, 'store'])->name('store.contacto');
Route::get('/mailable/contact', function(){
    return new Contacto('Dan hermes', 'dan@mail.com', '654367', 'México', 'Ninguno', 'Si');
});

// Colecciones especiales
Route::get('/colecciones-especiales', [ColeccionController::class, 'index'])->name('front.colecciones');
Route::get('/coleccion-especial/{slug}', [ColeccionController::class, 'show'])->name('front.colecciones.show');

// Eventos
Route::get('/eventos', [EventoController::class, 'index'])->name('front.eventos');

// Building
Route::get('/building', [BuildingHController::class, 'index'])->name('front.building');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');

        // Rutas Colecciones Especiales
        Route::get('/colecciones-especiales', [CollectionController::class, 'index'])->name('colecciones-especiales');
        Route::get('/colecciones-especiales/nueva-coleccion', [CollectionController::class, 'create'])->name('create.coleccion');
        Route::post('/colecciones-especiales', [CollectionController::class, 'store'])->name('store.coleccion');
        Route::get('/colecciones-especiales/{id}/edit', [CollectionController::class, 'edit'])->name('edit.coleccion');
        Route::match(['put', 'patch'], '/colecciones/{id}', [CollectionController::class, 'update'])->name('update.coleccion');
        Route::delete('/colecciones-especiales/{id}', [CollectionController::class, 'destroy'])->name('destroy.coleccion');

        // Rutas Eventos
        Route::get('/eventos', [EventController::class, 'index'])->name('eventos');
        Route::get('/eventos/nuevo-evento', [EventController::class, 'create'])->name('create.evento');
        Route::post('/eventos', [EventController::class, 'store'])->name('store.eventos');
        Route::get('/eventos/{id}/edit', [EventController::class, 'edit'])->name('edit.evento');
        Route::match(['put', 'patch'], '/eventos/{id}', [EventController::class, 'update'])->name('update.evento');
        Route::delete('/eventos/{id}', [EventController::class, 'destroy'])->name('destroy.evento');

        // Rutas Productos
        Route::get('/productos', [ProductController::class, 'index'])->name('productos');
        Route::get('/productos/nuevo-producto', [ProductController::class, 'create'])->name('create.producto');
        Route::post('/productos', [ProductController::class, 'store'])->name('store.producto');
        Route::get('/productos/{id}/edit', [ProductController::class, 'edit'])->name('edit.producto');
        Route::match(['put', 'patch'], '/productos/{id}', [ProductController::class, 'update'])->name('update.producto');
        Route::delete('/productos/{id}', [ProductController::class, 'destroy'])->name('destroy.producto');

        // Rutas Building
        Route::get('/building', [BuildingController::class, 'index'])->name('building');
        Route::get('/building/nuevo-building', [BuildingController::class, 'create'])->name('create.building');
        Route::post('/building', [BuildingController::class, 'store'])->name('store.building');
        Route::get('/building/{id}/edit', [BuildingController::class, 'edit'])->name('edit.building');
        Route::match(['put', 'patch'], '/building/{id}', [BuildingController::class, 'update'])->name('update.building');
        Route::delete('/building/{id}', [BuildingController::class, 'destroy'])->name('destroy.building');

        // Rutas Showrooms
        Route::get('/showrooms', [ShowroomController::class, 'index'])->name('showrooms');
        Route::get('/showrooms/nuevo-showroom', [ShowroomController::class, 'create'])->name('create.showroom');
        Route::post('/showrooms', [ShowroomController::class, 'store'])->name('store.showroom');
        Route::get('/showrooms/{id}/edit', [ShowroomController::class, 'edit'])->name('edit.showroom');
        Route::match(['put', 'patch'], '/showrooms/{id}', [ShowroomController::class, 'update'])->name('update.showroom');
        Route::delete('/showrooms/{id}', [ShowroomController::class, 'destroy'])->name('destroy.showroom');

        // Rutas Sliders
        Route::get('/sliders', [SliderController::class, 'index'])->name('sliders');
        Route::get('/sliders/nuevo-slider', [SliderController::class, 'create'])->name('create.slider');
        Route::post('/sliders', [SliderController::class, 'store'])->name('store.slider');
        Route::get('/sliders/{id}/edit', [SliderController::class, 'edit'])->name('edit.slider');
        Route::match(['put', 'patch'], '/sliders/{id}', [SliderController::class, 'update'])->name('update.slider');
        Route::delete('/sliders/{id}', [SliderController::class, 'destroy'])->name('destroy.slider');

        // Rutas Contacto
        Route::get('/contacto', [ContactController::class, 'index'])->name('contacto');
    });
});

