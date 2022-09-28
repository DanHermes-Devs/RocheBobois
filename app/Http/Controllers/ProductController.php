<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $productos = Product::paginate(10);
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
        return view('admin.productos.create', compact('colecciones', 'categorias', 'subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Product;
        $producto->slug = Str::slug($request->nombre_producto);

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/productos/'.$producto->slug, 'public');
            $img_destacada = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_destacada->save();
            $producto->imagen_destacada = $imagen_destacada;
        }

        if($request->file('galeria')){
            $galerias = $request->file('galeria');
            $img_galeria = array();
            foreach ($galerias as $imagefile) {
                $imagefile = $imagefile->store('uploads/productos/'.$producto->slug, 'public');
                $img_2 = Image::make(public_path("storage/{$imagefile}"))->fit(1920, 1080);
                $img_2->save();
                array_push($img_galeria, $imagefile);
            }
            $producto->galeria = json_encode($img_galeria);
        }
        
        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion = $request->descripcion;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->precio = $request->precio;
        $producto->precio_descuento = $request->precio_descuento;
        $producto->mostrar_en_sales = $request->mostrar_en_sales;

        // Guardamos el array de subcategorias
        $subcategorias = $request->subcategorias;
        $producto->subcategory_id = json_encode($subcategorias);
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
        $producto = Product::find($id);
        return view('admin.productos.edit', compact('producto'));
        
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
        $producto = Product::find($request->id);
        $producto->slug = Str::slug($request->nombre_producto);

        if(request('imagen_destacada')){
            // Eliminar primero imagen anterior
            $imagen_path = public_path("storage/{$producto->imagen_destacada}");
            if(File::exists($imagen_path) && $producto->imagen_destacada != null){
                unlink($imagen_path);
            }

            $imagen_destacada = $request->imagen_destacada->store('uploads/productos/'.$producto->slug, 'public');
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
                $img_2 = Image::make(public_path("storage/{$imagefile}"));
                $img_2->save();
                array_push($img_galeria, $imagefile);
            }
            $producto->galeria = json_encode($img_galeria);
        }

        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion = $request->descripcion;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->precio = $request->precio;
        $producto->precio_descuento = $request->precio_descuento;
        $producto->mostrar_en_sales = $request->mostrar_en_sales;
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
}
