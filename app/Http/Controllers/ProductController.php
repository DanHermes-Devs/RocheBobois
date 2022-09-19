<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Collection;
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
        return view('admin.productos.create', compact('colecciones'));
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

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/productos', 'public');
            $img_destacada = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_destacada->save();
            $producto->imagen_destacada = $imagen_destacada;
        }
        
        if(request('imagen_1')){
            $imagen_1 = $request->imagen_1->store('uploads/productos', 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_1}"))->fit(300, 300);
            $img_1->save();
            $producto->imagen_1 = $imagen_1;
        }
        
        if(request('imagen_2')){
            $imagen_2 = $request->imagen_2->store('uploads/productos', 'public');
            $img_2 = Image::make(public_path("storage/{$imagen_2}"));
            $img_2->save();
            $producto->imagen_2 = $imagen_2;
        }
        
        if(request('imagen_3')){
            $imagen_3 = $request->imagen_3->store('uploads/productos', 'public');
            $img_3 = Image::make(public_path("storage/{$imagen_3}"));
            $img_3->save();
            $producto->imagen_3 = $imagen_3;
        }
        
        if(request('imagen_4')){
            $imagen_4 = $request->imagen_4->store('uploads/productos', 'public');
            $img_4 = Image::make(public_path("storage/{$imagen_4}"));
            $img_4->save();
            $producto->imagen_4 = $imagen_4;
        }
        
        if(request('imagen_5')){
            $imagen_5 = $request->imagen_5->store('uploads/productos', 'public');
            $img_5 = Image::make(public_path("storage/{$imagen_5}"));
            $img_5->save();
            $producto->imagen_5 = $imagen_5;
        }

        if(request('imagen_5')){
            $imagen_6 = $request->imagen_6->store('uploads/productos', 'public');
            $img_6 = Image::make(public_path("storage/{$imagen_6}"));
            $img_6->save();
            $producto->imagen_6 = $imagen_6;

        }
        
        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion = $request->descripcion;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->precio = $request->precio;
        $producto->precio_descuento = $request->precio_descuento;
        $producto->mostrar_en_sales = $request->mostrar_en_sales;
        $producto->oportunidad_unica = $request->oportunidad_unica;
        $producto->coleccion_pertenece = $request->coleccion_pertenece;
        // Crear slug con funcion str::slug
        $producto->slug = Str::slug($request->nombre_producto);
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
        $colecciones = Collection::all();
        return view('admin.productos.edit', compact('producto', 'colecciones'));
        
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

        if(request('imagen_destacada')){
            // Eliminar primero imagen anterior
            $imagen_path = public_path("storage/{$producto->imagen_destacada}");
            if(File::exists($imagen_path) && $producto->imagen_destacada != null){
                unlink($imagen_path);
            }

            $imagen_destacada = $request->imagen_destacada->store('uploads/productos', 'public');
            $img_destacada = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_destacada->save();
            $producto->imagen_destacada = $imagen_destacada;
        }
        
        if(request('imagen_1')){
            // Eliminar primero imagen anterior
            $imagen_path = public_path("storage/{$producto->imagen_1}");
            if(File::exists($imagen_path) && $producto->imagen_1 != null){
                unlink($imagen_path);
            }

            $imagen_1 = $request->imagen_1->store('uploads/productos', 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_1}"))->fit(300, 300);
            $img_1->save();
            $producto->imagen_1 = $imagen_1;
        }
        
        if(request('imagen_2')){
            // Eliminar primero imagen anterior
            $imagen_path = public_path("storage/{$producto->imagen_2}");
            if(File::exists($imagen_path) && $producto->imagen_2 != null){
                unlink($imagen_path);
            }

            $imagen_2 = $request->imagen_2->store('uploads/productos', 'public');
            $img_2 = Image::make(public_path("storage/{$imagen_2}"));
            $img_2->save();
            $producto->imagen_2 = $imagen_2;
        }
        
        if(request('imagen_3')){
            // Eliminar primero imagen anterior
            $imagen_path = public_path("storage/{$producto->imagen_3}");
            if(File::exists($imagen_path) && $producto->imagen_3 != null){
                unlink($imagen_path);
            }

            $imagen_3 = $request->imagen_3->store('uploads/productos', 'public');
            $img_3 = Image::make(public_path("storage/{$imagen_3}"));
            $img_3->save();
            $producto->imagen_3 = $imagen_3;
        }
        
        if(request('imagen_4')){
            // Eliminar primero imagen anterior
            $imagen_path = public_path("storage/{$producto->imagen_4}");
            if(File::exists($imagen_path) && $producto->imagen_4 != null){
                unlink($imagen_path);
            }

            $imagen_4 = $request->imagen_4->store('uploads/productos', 'public');
            $img_4 = Image::make(public_path("storage/{$imagen_4}"));
            $img_4->save();
            $producto->imagen_4 = $imagen_4;
        }
        
        if(request('imagen_5')){
            // Eliminar primero imagen anterior
            $imagen_path = public_path("storage/{$producto->imagen_5}");
            if(File::exists($imagen_path) && $producto->imagen_5 != null){
                unlink($imagen_path);
            }

            $imagen_5 = $request->imagen_5->store('uploads/productos', 'public');
            $img_5 = Image::make(public_path("storage/{$imagen_5}"));
            $img_5->save();
            $producto->imagen_5 = $imagen_5;
        }

        if(request('imagen_6')){
            // Eliminar primero imagen anterior
            $imagen_path = public_path("storage/{$producto->imagen_6}");
            if(File::exists($imagen_path) && $producto->imagen_6 != null){
                unlink($imagen_path);
            }
            
            $imagen_6 = $request->imagen_6->store('uploads/productos', 'public');
            $img_6 = Image::make(public_path("storage/{$imagen_6}"));
            $img_6->save();
            $producto->imagen_6 = $imagen_6;
        }

        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion = $request->descripcion;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->precio = $request->precio;
        $producto->precio_descuento = $request->precio_descuento;
        $producto->mostrar_en_sales = $request->mostrar_en_sales;
        $producto->oportunidad_unica = $request->oportunidad_unica;
        $producto->coleccion_pertenece = $request->coleccion_pertenece;
        // Crear slug con funcion str::slug
        $producto->slug = Str::slug($request->nombre_producto);
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

        $imagen_path = public_path("storage/{$producto->imagen_1}");
        if(File::exists($imagen_path)){
            if($producto->imagen_1 != null){
                unlink($imagen_path);
            }
        }

        $imagen_path = public_path("storage/{$producto->imagen_2}");
        if(File::exists($imagen_path)){
            if($producto->imagen_2 != null){
                unlink($imagen_path);
            }
        }

        $imagen_path = public_path("storage/{$producto->imagen_3}");
        if(File::exists($imagen_path)){
            if($producto->imagen_3 != null){
                unlink($imagen_path);
            }
        }

        $imagen_path = public_path("storage/{$producto->imagen_4}");
        if(File::exists($imagen_path)){
            if($producto->imagen_4 != null){
                unlink($imagen_path);
            }
        }

        $imagen_path = public_path("storage/{$producto->imagen_5}");
        if(File::exists($imagen_path)){
            if($producto->imagen_5 != null){
                unlink($imagen_path);
            }
        }

        $imagen_path = public_path("storage/{$producto->imagen_6}");
        if(File::exists($imagen_path)){
            if($producto->imagen_6 != null){
                unlink($imagen_path);
            }
        }

        $producto->delete();

        return response()->json(['status' => 'success', 'message' => 'Producto eliminado correctamente.']);
    }
}
