<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colecciones = Collection::paginate(10);
        return view('admin.colecciones-especiales.index', compact('colecciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colecciones-especiales.create');
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
            'nombre_disenador' => 'required',
            'descripcion' => 'required',
            'nombre_coleccion' => 'required',
            'imagen_destacada' => 'required|image',
            'foto_disenador' => 'required|image',
            'galeria' => 'required',
        ], [
            'nombre_disenador.required' => 'El campo nombre del diseñador es obligatorio',
            'descripcion.required' => 'El campo descripción es obligatorio',
            'nombre_coleccion.required' => 'El campo nombre de la colección es obligatorio',
            'imagen_destacada.required' => 'El campo imagen destacada es obligatorio',
            'imagen_destacada.image' => 'El campo imagen destacada debe ser una imagen',
            'foto_disenador.required' => 'El campo foto del diseñador es obligatorio',
            'foto_disenador.image' => 'El campo foto del diseñador debe ser una imagen',
            'galeria.required' => 'El campo galería es obligatorio',
        ]);

        $collection = new Collection;
        $collection->slug = Str::slug($request->nombre_disenador);

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/coleccion/'.$collection->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $collection->imagen_destacada = $imagen_destacada;
        }
        
        if(request('foto_disenador')){
            $foto_disenador = $request->foto_disenador->store('uploads/coleccion/'.$collection->slug, 'public');
            $img_2 = Image::make(public_path("storage/{$foto_disenador}"));
            $img_2->save();
            $collection->foto_disenador = $foto_disenador;
        }


        if($request->file('galeria')){
            $galerias = $request->file('galeria');
            $img_galeria = array();
            foreach ($galerias as $imagefile) {
                $imagefile = $imagefile->store('uploads/coleccion/'.$collection->slug, 'public');
                $img_2 = Image::make(public_path("storage/{$imagefile}"))->fit(1920, 1080);
                $img_2->save();
                array_push($img_galeria, $imagefile);
            }
            $collection->img_galeria = json_encode($img_galeria);
        }

        $collection->nombre_disenador = $request->nombre_disenador;
        $collection->descripcion = $request->descripcion;
        $collection->nombre_coleccion = $request->nombre_coleccion;
        // Crear slug con funcion str::slug
        $collection->slug = Str::slug($request->nombre_disenador);
        $collection->save();

        return redirect()->route('colecciones-especiales')->with(['coleccion' => $collection, 'store' => 'Colección creada correctamente.', 'status' => 'success']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection, $id)
    {
        return view('admin.colecciones-especiales.edit')->with([
            'coleccion' => Collection::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        $request->validate([
            'nombre_disenador' => 'required',
            'descripcion' => 'required',
            'nombre_coleccion' => 'required',
            'imagen_destacada' => 'required|image',
            'foto_disenador' => 'required|image',
            'galeria' => 'required',
        ], [
            'nombre_disenador.required' => 'El campo nombre del diseñador es obligatorio',
            'descripcion.required' => 'El campo descripción es obligatorio',
            'nombre_coleccion.required' => 'El campo nombre de la colección es obligatorio',
            'imagen_destacada.required' => 'El campo imagen destacada es obligatorio',
            'imagen_destacada.image' => 'El campo imagen destacada debe ser una imagen',
            'foto_disenador.required' => 'El campo foto del diseñador es obligatorio',
            'foto_disenador.image' => 'El campo foto del diseñador debe ser una imagen',
            'galeria.required' => 'El campo galería es obligatorio',
        ]);

        $coleccion = Collection::findOrFail($request->id);
        $coleccion->slug = Str::slug($request->nombre_disenador);

        if(request('imagen_destacada')){
            // Eliminar el logotipo
            $imagen_path = public_path("storage/{$coleccion->imagen_destacada}");
            if(File::exists($imagen_path) && $coleccion->imagen_destacada != null){
                unlink($imagen_path);
            }
            
            $imagen_destacada = $request->imagen_destacada->store('uploads/coleccion/'.$coleccion->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $coleccion->imagen_destacada = $imagen_destacada;
        }

        if(request('foto_disenador')){
            // Eliminar el logotipo
            $imagen_path = public_path("storage/{$coleccion->foto_disenador}");
            if(File::exists($imagen_path) && $coleccion->foto_disenador != null){
                unlink($imagen_path);
            }

            $foto_disenador = $request->foto_disenador->store('uploads/coleccion/'.$coleccion->slug, 'public');
            $img_2 = Image::make(public_path("storage/{$foto_disenador}"));
            $img_2->save();
            $coleccion->foto_disenador = $foto_disenador;
        }
        
        if($request->file('galeria')){
            $galerias = $request->file('galeria');
            $img_galeria = array();
            foreach ($galerias as $imagefile) {
                // Eliminar las imagenes
                $imagen_path = public_path("storage/{$coleccion->galeria}");
                if(File::exists($imagen_path) && $coleccion->galeria != null){
                    unlink($imagen_path);
                }

                $imagefile = $imagefile->store('uploads/coleccion'.$coleccion->slug, 'public');
                $img_2 = Image::make(public_path("storage/{$imagefile}"));
                $img_2->save();
                array_push($img_galeria, $imagefile);
            }
            $coleccion->img_galeria = json_encode($img_galeria);
        }

        $coleccion->nombre_disenador = $request->nombre_disenador;
        $coleccion->descripcion = $request->descripcion;
        $coleccion->nombre_coleccion = $request->nombre_coleccion;
        $coleccion->save();

        return redirect()->route('edit.coleccion', $coleccion->id)->with(['coleccion' => $coleccion, 'store' => 'Colección editada correctamente.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection, $id)
    {
        $coleccion = Collection::findOrFail($id);

        // Eliminar imagenes del servidor
        $imagen_path_1 = public_path("storage/" . $coleccion->imagen_destacada);
        if(File::exists($imagen_path_1)){
            // Evitar que unlink de error si el archivo no existe
            if($coleccion->imagen_destacada != null){
                unlink($imagen_path_1);
            }
        }

        $imagen_path_2 = public_path("storage/" . $coleccion->foto_disenador);
        if(File::exists($imagen_path_2)){
            // Evitar que unlink de error si el archivo no existe
            if($coleccion->foto_disenador != null){
                unlink($imagen_path_2);
            }
        }

        // Eliminar la galeria
        $galeria = json_decode($coleccion->img_galeria);
        foreach ($galeria as $image) {
            $imagen_path_3 = public_path("storage/" . $image);
            if(File::exists($imagen_path_3)){
                // Evitar que unlink de error si el archivo no existe
                if($image != null){
                    unlink($imagen_path_3);
                }
            }
        }

        // Eliminar carpeta de la coleccion
        $carpeta = public_path("storage/uploads/coleccion/" . $coleccion->slug);
        if(File::exists($carpeta)){
            // Evitar que unlink de error si el archivo no existe
            if($coleccion->slug != null){
                File::deleteDirectory($carpeta);
            }
        }

        $coleccion->delete();

        return response()->json(['status' => 'success', 'message' => 'Colección eliminada correctamente.']);
    }
}
