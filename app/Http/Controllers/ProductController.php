<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use App\Models\HomeOffice;
use App\Models\SellerBest;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Product::all();
        
        if (request()->ajax()) {
            return DataTables()
                ->of($productos)
                ->addColumn('action', 'admin.productos.actions')
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->make();
        }

        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colecciones = Collection::all();
        $categorias = Category::all();
        $subcategorias = Subcategory::all();
        $homeOffices = HomeOffice::all();
        $sellerBest = SellerBest::all();

        return view('admin.productos.create', compact('colecciones', 'categorias', 'subcategorias', 'homeOffices', 'sellerBest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'mostrar_en_sales' => 'required|integer',
            'imagen_destacada' => 'required|image|mimes:jpeg,png,jpg',
        ], [
            'nombre_producto.required' => 'El campo nombre del producto es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'precio.required' => 'El campo precio es obligatorio.',
            'mostrar_en_sales.required' => 'El campo mostrar en sales es obligatorio.',
            'mostrar_en_sales.integer' => 'El campo mostrar en sales es obligatorio.',
            'imagen_destacada.required' => 'El campo imagen destacada es obligatorio.',
            'imagen_destacada.image' => 'El archivo debe ser una imagen.',
            'imagen_destacada.mimes' => 'El archivo debe ser una imagen con formato jpeg, png o jpg.',
        ]);

        $producto = new Product;
        $producto->slug = Str::slug($request->nombre_producto);

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/productos/'.$producto->slug, 'public');
            // Hacer rezise de la imagen a 800x800 y mantener la proporción
            // $imagen_destacada = Image::make(public_path("storage/{$imagen_destacada}"))->resizeCanvas(500, 200, 'center', true, 'fff');
            $imagen_destacada = Image::make(public_path("storage/{$imagen_destacada}"));
            $imagen_destacada->save();
            $producto->imagen_destacada = $imagen_destacada;
        }

        if($request->file('galeria')){
            $galerias = $request->file('galeria');
            $img_galeria = array();
            foreach ($galerias as $imagefile) {
                $imagefile = $imagefile->store('uploads/productos/'.$producto->slug, 'public');
                // $img_2 = Image::make(public_path("storage/{$imagefile}"))->resizeCanvas(500, 200, 'center', true, 'fff');
                $img_2 = Image::make(public_path("storage/{$imagefile}"));
                $img_2->save();
                array_push($img_galeria, $imagefile);
            }
            $producto->galeria = json_encode($img_galeria);
        }
        
        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->precio_descuento = $request->precio_descuento;
        $producto->mostrar_en_sales = $request->mostrar_en_sales;
        $producto->best_seller = $request->best_seller ?? null;
        $producto->oportunidad_unica = $request->oportunidad_unica ?? null;
        $producto->home_office = $request->home_office ?? null;
        // Si viene vacia la colección, se le asigna el valor null
        $producto->coleccion_pertenece = $request->coleccion_pertenece ?? null;
        $producto->category_id = $request->category_id ?? null;
        $producto->subcategory_id = $request->subcategory_id ?? null;
        $producto->save();

        return redirect()->route('productos')->with(['producto' => $producto, 'store' => 'Producto creado correctamente.', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $colecciones = Collection::all();
        $producto = Product::find($id);
        $categoria = Category::all();
        $subcategoria = Subcategory::where('id', $producto->subcategory_id)->get();
        $homeOffices = HomeOffice::all();
        $sellerBest = SellerBest::all();

        return view('admin.productos.edit', compact('producto', 'categoria', 'subcategoria', 'colecciones', 'homeOffices', 'sellerBest'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'nombre_producto' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'mostrar_en_sales' => 'required|integer',
        ], [
            'nombre_producto.required' => 'El campo nombre del producto es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'precio.required' => 'El campo precio es obligatorio.',
            'mostrar_en_sales.required' => 'El campo mostrar en sales es obligatorio.',
            'mostrar_en_sales.integer' => 'El campo mostrar en sales es obligatorio.',
        ]);

        $producto = Product::find($request->id);
        $producto->slug = Str::slug($request->nombre_producto);

        if(request('imagen_destacada')){
            // Eliminar primero imagen anterior
            $imagen_path = public_path("storage/{$producto->imagen_destacada}");
            if(File::exists($imagen_path) && $producto->imagen_destacada != null){
                unlink($imagen_path);
            }

            $imagen_destacada = $request->imagen_destacada->store('uploads/productos/'.$producto->slug, 'public');
            // Recortar imagen a 800x800 con object-fit: contain
            // $img_destacada = Image::make(public_path("storage/{$imagen_destacada}"))->resizeCanvas(500, 200, 'center', true, 'fff');
            $img_destacada = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_destacada->save();
            $producto->imagen_destacada = $imagen_destacada;
        }
        
        if($request->file('galeria')){
            $galerias = $request->file('galeria');
            $img_galeria = array();
            foreach ($galerias as $imagefile) {
                // Eliminar el logotipo
                $imagen_path = public_path("storage/{$producto->galeria}");
                if(File::exists($imagen_path) && $producto->galeria != null){
                    unlink($imagen_path);
                }

                $imagefile = $imagefile->store('uploads/productos/'.$producto->slug, 'public');
                // Redimensionar imagen a 500x500 con object-fit: contain
                // $img_2 = Image::make(public_path("storage/{$imagefile}"))->resizeCanvas(500, 200, 'center', true, 'fff');
                $img_2 = Image::make(public_path("storage/{$imagefile}"));
                $img_2->save();
                array_push($img_galeria, $imagefile);
            }
            $producto->galeria = json_encode($img_galeria);
        }

        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->precio_descuento = $request->precio_descuento;
        $producto->mostrar_en_sales = $request->mostrar_en_sales;
        $producto->best_seller = $request->best_seller ?? null;
        $producto->oportunidad_unica = $request->oportunidad_unica ?? null;
        $producto->home_office = $request->home_office ?? null;
        $producto->coleccion_pertenece = $request->coleccion_pertenece ?? null;
        $producto->category_id = $request->category_id ?? null;
        $producto->subcategory_id = $request->subcategory_id ?? null;
        $producto->save();

        return redirect()->route('edit.producto', $producto->id)->with(['producto' => $producto, 'store' => 'Producto actualizado correctamente.', 'status' => 'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $producto = Product::find($id);

        $imagen_path = public_path("storage/{$producto->imagen_destacada}");
        if(File::exists($imagen_path)){
            if($producto->imagen_destacada != null){
                unlink($imagen_path);
            }
        }

        // Eliminar imagenes de la galeria
        $galeria = json_decode($producto->galeria);
        foreach ($galeria as $image) {
            $imagen_path = public_path("storage/{$image}");
            if(File::exists($imagen_path)){
                if($image != null){
                    unlink($imagen_path);
                }
            }
        }

        // Eliminar carpeta del producto
        $carpeta = public_path("storage/uploads/productos/{$producto->slug}");
        if(File::exists($carpeta)){
            if($producto->slug != null){
                File::deleteDirectory($carpeta);
            }
        }

        $producto->delete();

        return response()->json(['status' => 'success', 'message' => 'Producto eliminado correctamente.']);
    }

    // Importar archivo 
    public function import(Request $request)
    {
        $file = $request->file('file');
        // return Excel::toCollection(new ProductsImport, $file);
        Excel::import(new ProductsImport, $file);

        return redirect()->route('productos')->with(['store' => 'Productos importados correctamente.', 'status' => 'success']);
    }

    // Exportar archivo
    public function export()
    {
        return Excel::download(new ProductsExport, 'productos.xlsx');   
    }
}
