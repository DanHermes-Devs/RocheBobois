<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BuildingCategory;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BuildingCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = BuildingCategory::all();
        
        if (request()->ajax()) {
            return DataTables()
                ->of($categorias)
                ->addColumn('action', 'admin.building.building-categorias.actions')
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('admin.building.building-categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.building.building-categorias.create');
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

        $categoria = new BuildingCategory;
        $categoria->slug = Str::slug($request->nombre);

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/categorias-buildings/'.$categoria->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $categoria->imagen_destacada = $imagen_destacada;
        }

        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('building-categories')->with(['building-categories' => $categoria, 'store' => 'Categoría creada correctamente.', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BuildingCategory  $buildingCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BuildingCategory $buildingCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuildingCategory  $buildingCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BuildingCategory $buildingCategory, $id)
    {
        $categoria = BuildingCategory::find($id);
        return view('admin.building.building-categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BuildingCategory  $buildingCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuildingCategory $buildingCategory)
    {
        $request->validate([
            'nombre' => 'required',
            'imagen_destacada' => 'image'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'imagen_destacada.image' => 'El archivo no es una imagen'
        ]);

        $categoria = BuildingCategory::find($request->id);
        $categoria->slug = Str::slug($request->nombre);

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/categorias-buildings/'.$categoria->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $categoria->imagen_destacada = $imagen_destacada;
        }

        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('building-categories')->with(['building-categories' => $categoria, 'store' => 'Categoría actualizada correctamente.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuildingCategory  $buildingCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuildingCategory $buildingCategory, $id)
    {
        $categoria = BuildingCategory::find($id);

        // Eliminar imagen
        $imagen_path = public_path("storage/{$categoria->imagen_destacada}");
        if(File::exists($imagen_path) && $categoria->imagen_destacada != null){
            unlink($imagen_path);
        }

        // Eliminar carpeta de la categoría
        $carpeta_path = public_path("storage/uploads/categorias-buildings/{$categoria->slug}");
        if(File::exists($carpeta_path) && $categoria->slug != null){
            File::deleteDirectory($carpeta_path);
        }

        $categoria->delete();

        return response()->json(['status' => 'success', 'message' => 'Categoría eliminada correctamente.']);
    }
}
