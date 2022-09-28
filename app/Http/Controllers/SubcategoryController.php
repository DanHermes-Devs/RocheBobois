<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategorias = Subcategory::paginate(10);
        $categorias = Category::all();
        return view('admin.subcategorias.index', compact('subcategorias', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::all();
        return view('admin.subcategorias.create', compact('categorias'));
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
            'nombre' => 'required',
            'imagen_destacada' => 'required',
            'category_id' => 'required'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'imagen_destacada.required' => 'El campo imagen destacada es obligatorio',
            'category_id.required' => 'El campo categoría es obligatorio'
        ]);

        $subcategoria = new Subcategory();
        $subcategoria->slug = Str::slug($request->nombre);

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/subcategoria/'.$subcategoria->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $subcategoria->imagen_destacada = $imagen_destacada;
        }

        $subcategoria->nombre = $request->nombre;
        $subcategoria->category_id = $request->category_id;
        $subcategoria->save();

        return redirect()->route('subcategorias')->with(['subcategoria' => $subcategoria, 'store' => 'Subcategoría creada correctamente', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory, $id)
    {
        $subcategoria = Subcategory::find($id);
        $categorias = Category::all();
        return view('admin.subcategorias.edit', compact('subcategoria', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'nombre' => 'required',
            'category_id' => 'required'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'category_id.required' => 'El campo categoría es obligatorio'
        ]);

        $subcategoria = Subcategory::find($request->id);

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/subcategoria/'.$subcategoria->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $subcategoria->imagen_destacada = $imagen_destacada;
        }

        $subcategoria->nombre = $request->nombre;
        $subcategoria->category_id = $request->category_id;
        $subcategoria->save();

        return redirect()->route('subcategorias')->with(['subcategoria' => $subcategoria, 'update' => 'Subcategoría actualizada correctamente', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory, $id)
    {
        $subcategoria = Subcategory::find($id);

        // Eliminar imagen
        $imagen_path = public_path("storage/{$subcategoria->imagen_destacada}");
        if(File::exists($imagen_path) && $subcategoria->imagen_destacada != null){
            unlink($imagen_path);
        }

        // Eliminar carpeta de la categoría
        $carpeta_path = public_path("storage/uploads/categorias/{$subcategoria->slug}");
        if(File::exists($carpeta_path) && $subcategoria->slug != null){
            File::deleteDirectory($carpeta_path);
        }

        $subcategoria->delete();

        return response()->json(['status' => 'success', 'message' => 'Subcategoría eliminada correctamente']);
    }
}
