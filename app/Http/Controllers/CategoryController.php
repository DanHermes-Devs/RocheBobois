<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Category::all();

        if (request()->ajax()) {
            return DataTables()
                ->of($categorias)
                ->addColumn('action', 'admin.categorias.actions')
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
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
            'imagen_destacada' => 'required|image'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'imagen_destacada.required' => 'El campo imagen es obligatorio',
            'imagen_destacada.image' => 'El archivo no es una imagen'
        ]);

        $categoria = new Category;
        $categoria->slug = Str::slug($request->nombre);

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/categorias/'.$categoria->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $categoria->imagen_destacada = $imagen_destacada;
        }

        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categorias')->with(['categoria' => $categoria, 'store' => 'Categoría creada correctamente.', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $categoria = Category::find($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nombre' => 'required',
            'imagen_destacada' => 'image'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'imagen_destacada.image' => 'El archivo no es una imagen'
        ]);

        $categoria = Category::find($request->id);

        if(request('imagen_destacada')){
            // Eliminar imagen anterior
            $imagen_path = public_path("storage/{$categoria->imagen_destacada}");
            if(File::exists($imagen_path) && $categoria->imagen_destacada != null){
                unlink($imagen_path);
            }

            $imagen_destacada = $request->imagen_destacada->store('uploads/categorias/'. $categoria->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $categoria->imagen_destacada = $imagen_destacada;
        }

        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categorias')->with(['categoria' => $categoria, 'update' => 'Categoría actualizada correctamente.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        $categoria = Category::find($id);

        // Eliminar imagen
        $imagen_path = public_path("storage/{$categoria->imagen_destacada}");
        if(File::exists($imagen_path) && $categoria->imagen_destacada != null){
            unlink($imagen_path);
        }

        // Eliminar carpeta de la categoría
        $carpeta_path = public_path("storage/uploads/categorias/{$categoria->slug}");
        if(File::exists($carpeta_path) && $categoria->slug != null){
            File::deleteDirectory($carpeta_path);
        }

        $categoria->delete();

        return response()->json(['status' => 'success', 'message' => 'Categoría eliminada correctamente.']);
    }
}
