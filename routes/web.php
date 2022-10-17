<?php

defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));

use App\Models\Order;
use App\Mail\Contacto;
use App\Mail\OrderMail;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShowroomController;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\HomeOfficeController;
use App\Http\Controllers\SellerBestController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\frontend\CobroController;
use App\Http\Controllers\frontend\SalesController;
use App\Http\Controllers\frontend\EventoController;
use App\Http\Controllers\BuildingCategoryController;
use App\Http\Controllers\CongiruationController;
use App\Http\Controllers\frontend\BuildingHController;
use App\Http\Controllers\frontend\ColeccionController;
use App\Http\Controllers\frontend\BestSellerController;
use App\Http\Controllers\frontend\OportunidadController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\frontend\ShowroomController as FrontendShowroomController;
use App\Http\Controllers\frontend\HomeOfficeController as FrontendHomeOfficeController;
use App\Models\Congiruation;

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

// Auth::routes();

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('store.register');

// Rutas publicas
Route::get('/', [InicioController::class, 'index'])->name('inicio');

// Ruta Bienvenida
Route::get('/bienvenida', [InicioController::class, 'bienvenida'])->name('bienvenida')->middleware(['auth', 'verified']);

// Showrooms
Route::get('/showrooms', [FrontendShowroomController::class, 'index'])->name('front.showrooms');
Route::get('/showroom/{slug}', [FrontendShowroomController::class, 'show'])->name('front.showrooms.show');

// Contacto
Route::get('/contacto', [InicioController::class, 'contacto'])->name('front.contacto');
Route::post('/contacto', [ContactController::class, 'store'])->name('store.contacto');

// Visualizar el correo de contacto
Route::get('/mailable/contact', function(){
    return new Contacto('Dan hermes', 'dan@mail.com', '654367', 'México', 'Ninguno', 'Si');
});

// Sales
// Route::get('/sales', [SalesController::class, 'index'])->name('front.sales')->middleware(['auth', 'verified']);
Route::get('/sales/{slug}', [SalesController::class, 'index'])->name('front.sales')->middleware(['auth', 'verified']);
Route::get('/sale/{slug}', [SalesController::class, 'show'])->name('front.sales.show')->middleware(['auth', 'verified']);

// Aviso de privacidad
Route::get('/aviso-privacidad', function(){
    $congiruation = Congiruation::first();
    return view('configuraciones.aviso', compact('congiruation'));
})->name('front.aviso-privacidad');

// Terminos y condiciones
Route::get('/terminos-condiciones', function(){
    $congiruation = Congiruation::first();
    return view('configuraciones.terminos', compact('congiruation'));
})->name('front.terminos-condiciones');

// Rutas Best Seller
Route::get('/best-seller', [BestSellerController::class, 'index'])->name('front.best-seller')->middleware(['auth', 'verified']);
Route::get('/best-seller/{slug}', [BestSellerController::class, 'show'])->name('front.best-seller.show')->middleware(['auth', 'verified']);

// Rutas Oportunidades Unicas
Route::get('/oportunidades-unicas', [OportunidadController::class, 'index'])->name('front.oportunidadesUnicas')->middleware(['auth', 'verified']);

Route::get('/destruir-carrito', function(){
    Cart::destroy();
});

// Ruta para añadir al carrito
Route::post('/add-to-cart', [AddToCartController::class, 'addToCart'])->name('addToCart');
Route::get('/carrito', [AddToCartController::class, 'index'])->name('cart.index');
Route::match(['put', 'patch'], '/carrito/{rowId}', [AddToCartController::class, 'update'])->name('cart.update');
Route::delete('/carrito/{rowId}', [AddToCartController::class, 'destroy'])->name('cart.destroy');

// Rutas para el checkout
Route::get('/checkout', [CobroController::class, 'index'])->name('checkout')->middleware(['auth', 'verified']);

// Hacer publica la ruta de almacenamiento
Route::get('/storage_link', function() {

    Artisan::call('storage:link');

})->middleware(['auth', 'verified']);

// Fresh y almcaenamiento de la base de datos
Route::get('/fresh_db', function() {

    Artisan::call('migrate:fresh --seed');

});

// Arreglamos el error Udefined constant 'STDIN'
Route::get('/fix', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');

});

// Iseed para las tablas que ya tienen datos
Route::get('/table_iseed', function() { 
    Artisan::call('iseed bookings --force');
    Artisan::call('iseed seller_bests --force');
    Artisan::call('iseed home_offices --force');
    Artisan::call('iseed building_categories --force');
    Artisan::call('iseed event_categories --force');
    Artisan::call('iseed events --force');
    Artisan::call('iseed products --force');
    Artisan::call('iseed categories --force');
    Artisan::call('iseed categories --force');
    Artisan::call('iseed subcategories --force');
    Artisan::call('iseed buildings --force');
    Artisan::call('iseed contacts --force');
    Artisan::call('iseed congiruations --force');
});

// Colecciones especiales
Route::get('/colecciones-especiales', [ColeccionController::class, 'index'])->name('front.colecciones')->middleware(['auth', 'verified']);
Route::get('/coleccion-especial/{slug}', [ColeccionController::class, 'show'])->name('front.colecciones.show')->middleware(['auth', 'verified']);

// Eventos
Route::get('/eventos', [EventoController::class, 'index'])->name('front.eventos')->middleware(['auth', 'verified']);
Route::get('/evento/{slug}', [EventoController::class, 'show'])->name('front.eventos.show')->middleware(['auth', 'verified']);

// Building
Route::get('/building', [BuildingHController::class, 'index'])->name('front.building')->middleware(['auth', 'verified']);
Route::get('/building/{slug}', [BuildingHController::class, 'show'])->name('building.show')->middleware(['auth', 'verified']);

// Home Office
Route::get('/home-office', [FrontendHomeOfficeController::class, 'index'])->name('front.home-office')->middleware(['auth', 'verified']);
Route::get('/home-office/{slug}', [FrontendHomeOfficeController::class, 'show'])->name('home-office.show')->middleware(['auth', 'verified']);

// Bookings
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

// Perfil
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil')->middleware(['auth', 'verified']);
Route::get('/perfil/view-order/{id}', [PerfilController::class, 'viewOrder'])->name('perfil.view-order')->middleware(['auth', 'verified']);
Route::match(['put', 'patch'], '/perfil/{id}', [PerfilController::class, 'update'])->name('perfil.update')->middleware(['auth', 'verified']);
// Imprimir Recibo
Route::get('/perfil/print-order/{id}', [PerfilController::class, 'printOrder'])->name('perfil.print-order')->middleware(['auth', 'verified']);
// Imprimir reserva
Route::get('/perfil/print-booking/{id}', [PerfilController::class, 'printBooking'])->name('perfil.print-booking')->middleware(['auth', 'verified']);

// Rutas de los Payments
Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

// Visualizar el correo de contacto
Route::get('/mailable/order', function(){
    // Enviar el correo con la información de la compra
    $invoice = Order::findOrFail(31);
    $itemsOrder = OrderItem::where('order_id', 31)->get();

    // Buscar los productos que se compraron
    $products = Product::whereIn('id', $itemsOrder->pluck('product_id'))->get();
    
    $prods = [];
    foreach($products as $product){
        $prods[$product->id] = $product;

        // Mostrar la cantidad
        $prods[$product->id]->quantity = $itemsOrder->where('product_id', $product->id)->first()->quantity;
    }
    
    $data = [
        'invoice' => $invoice->invoice_no,
        'total' => $invoice->total,
        'nombre_completo' => $invoice->nombre_completo,
        'email' => $invoice->email,
        'telefono' => $invoice->telefono,
        'direccion_principal' => $invoice->direccion_principal,
        'direccion_opcional' => $invoice->direccion_opcional,
        'pais' => $invoice->pais,
        'estado' => $invoice->estado,
        'codigo_postal' => $invoice->codigo_postal,
        'informacion_adicional' => $invoice->informacion_adicional,
        'payment_type' => $invoice->payment_type,
        'payment_method' => $invoice->payment_method,
        'payment_id' => $invoice->payment_id,
        'transaction_id' => $invoice->transaction_id,
        'currency' => $invoice->currency,
        'order_no' => $invoice->order_no,
        'created_at' => $invoice->created_at,
        'prods' => $prods,
    ];

    return new OrderMail($data);
});

// Pagina de agradecimiento
Route::get('/success', function(){
    return view('checkout.success');
})->name('payments.success')->middleware(['auth', 'verified']);

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/bienvenida');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'admin', 'prefix' => 'dashboard'], function() {
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

        // Rutas Category Eventos
        Route::get('/event-categories', [EventCategoryController::class, 'index'])->name('event-categories');
        Route::get('/event-categories/nueva-categoria', [EventCategoryController::class, 'create'])->name('create.event-category');
        Route::post('/event-categories', [EventCategoryController::class, 'store'])->name('store.event-category');
        Route::get('/event-categories/{id}/edit', [EventCategoryController::class, 'edit'])->name('edit.event-category');
        Route::match(['put', 'patch'], '/event-categories/{id}', [EventCategoryController::class, 'update'])->name('update.event-category');
        Route::delete('/event-categories/{id}', [EventCategoryController::class, 'destroy'])->name('destroy.event-category');

        // Rutas Productos
        Route::get('/productos', [ProductController::class, 'index'])->name('productos');
        Route::get('/productos/nuevo-producto', [ProductController::class, 'create'])->name('create.producto');
        Route::post('/productos', [ProductController::class, 'store'])->name('store.producto');
        Route::get('/productos/{id}/edit', [ProductController::class, 'edit'])->name('edit.producto');
        Route::match(['put', 'patch'], '/productos/{id}', [ProductController::class, 'update'])->name('update.producto');
        Route::delete('/productos/{id}', [ProductController::class, 'destroy'])->name('destroy.producto');
        // Importar productos
        Route::get('/productos/importar', function(){
            return view('admin.productos.import');
        })->name('import.productos');
        Route::post('/productos/importar', [ProductController::class, 'import'])->name('import.producto');
        // Exportar productos
        Route::get('/productos/exportar', [ProductController::class, 'export'])->name('export.productos');

        // Rutas Categorias de Productos
        Route::get('/categorias-productos', [CategoryController::class, 'index'])->name('categorias');
        Route::get('/categorias-productos/nueva-categoria', [CategoryController::class, 'create'])->name('create.categoria');
        Route::post('/categorias-productos', [CategoryController::class, 'store'])->name('store.categoria');
        Route::get('/categorias-productos/{id}/edit', [CategoryController::class, 'edit'])->name('edit.categoria');
        Route::match(['put', 'patch'], '/categorias-productos/{id}', [CategoryController::class, 'update'])->name('update.categoria');
        Route::delete('/categorias-productos/{id}', [CategoryController::class, 'destroy'])->name('destroy.categoria');

        // Rutas Subcategorias de Productos
        Route::get('/subcategorias-productos', [SubcategoryController::class, 'index'])->name('subcategorias');
        Route::get('/subcategorias-productos/nueva-subcategoria', [SubcategoryController::class, 'create'])->name('create.subcategoria');
        Route::post('/subcategorias-productos', [SubcategoryController::class, 'store'])->name('store.subcategoria');
        Route::get('/subcategorias-productos/{id}/edit', [SubcategoryController::class, 'edit'])->name('edit.subcategoria');
        Route::match(['put', 'patch'], '/subcategorias-productos/{id}', [SubcategoryController::class, 'update'])->name('update.subcategoria');
        Route::delete('/subcategorias-productos/{id}', [SubcategoryController::class, 'destroy'])->name('destroy.subcategoria');
        // Obtener las subcategorias de una categoria por ajax subcategorias.fetch
        Route::get('/subcategorias-productos/fetch/{id}', [SubcategoryController::class, 'fetch'])->name('subcategorias.fetch');

        // Rutas Building
        Route::get('/building', [BuildingController::class, 'index'])->name('building');
        Route::get('/building/nuevo-building', [BuildingController::class, 'create'])->name('create.building');
        Route::post('/building', [BuildingController::class, 'store'])->name('store.building');
        Route::get('/building/{id}/edit', [BuildingController::class, 'edit'])->name('edit.building');
        Route::match(['put', 'patch'], '/building/{id}', [BuildingController::class, 'update'])->name('update.building');
        Route::delete('/building/{id}', [BuildingController::class, 'destroy'])->name('destroy.building');

        // Rutas Category Building
        Route::get('/building-categories', [BuildingCategoryController::class, 'index'])->name('building-categories');
        Route::get('/building-categories/nueva-categoria', [BuildingCategoryController::class, 'create'])->name('create.building-category');
        Route::post('/building-categories', [BuildingCategoryController::class, 'store'])->name('store.building-category');
        Route::get('/building-categories/{id}/edit', [BuildingCategoryController::class, 'edit'])->name('edit.building-category');
        Route::match(['put', 'patch'], '/building-categories/{id}', [BuildingCategoryController::class, 'update'])->name('update.building-category');
        Route::delete('/building-categories/{id}', [BuildingCategoryController::class, 'destroy'])->name('destroy.building-category');

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

        // Rutas Home Office
        Route::get('/home-office', [HomeOfficeController::class, 'index'])->name('home-office');
        Route::get('/home-office/nueva-categoría', [HomeOfficeController::class, 'create'])->name('create.home-office');
        Route::post('/home-office', [HomeOfficeController::class, 'store'])->name('store.home-office');
        Route::get('/home-office/{id}/edit', [HomeOfficeController::class, 'edit'])->name('edit.home-office');
        Route::match(['put', 'patch'], '/home-office/{id}', [HomeOfficeController::class, 'update'])->name('update.home-office');
        Route::delete('/home-office/{id}', [HomeOfficeController::class, 'destroy'])->name('destroy.home-office');

        // Rutas Best Seller
        Route::get('/best-seller', [SellerBestController::class, 'index'])->name('back.best-seller');
        Route::get('/best-seller/nueva-categoría', [SellerBestController::class, 'create'])->name('create.back.best-seller');
        Route::post('/best-seller', [SellerBestController::class, 'store'])->name('store.back.best-seller');
        Route::get('/best-seller/{id}/edit', [SellerBestController::class, 'edit'])->name('edit.back.best-seller');
        Route::match(['put', 'patch'], '/best-seller/{id}', [SellerBestController::class, 'update'])->name('update.back.best-seller');
        Route::delete('/best-seller/{id}', [SellerBestController::class, 'destroy'])->name('destroy.back.best-seller');

        // Bookings
        Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
        Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('show.booking');
        Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('destroy.booking');
        Route::match(['put', 'patch'], '/bookings/actualizar-check-in/{id}', [BookingController::class, 'checkin'])->name('checkin.booking');

        // Checkin de la reserva en el lobby
        Route::get('/reserva/{codigo_reserva}', [BookingController::class, 'checkin_page'])->name('checkin.page');

        // Ordenes
        Route::get('/orders', [OrderController::class, 'index'])->name('index.orders');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('show.order');
        Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('destroy.order');
        Route::match(['put', 'patch'], '/orders/actualizar-orden/{id}', [OrderController::class, 'update'])->name('update.order');

        // Configuraciónes
        Route::get('/aviso-privacidad', [CongiruationController::class, 'aviso_privacidad'])->name('aviso_privacidad');
        Route::match(['put', 'patch'], '/aviso-privacidad/{id}', [CongiruationController::class, 'update_aviso_privacidad'])->name('update.aviso_privacidad');
        
        Route::get('/terminos-y-condiciones', [CongiruationController::class, 'terminos_condiciones'])->name('terminos_condiciones');
        Route::match(['put', 'patch'], '/terminos-y-condiciones/{id}', [CongiruationController::class, 'update_terminos_condiciones'])->name('update.terminos_condiciones');
    });
});

