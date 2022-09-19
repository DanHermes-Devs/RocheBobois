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
        
        $collection = new Collection;
        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/coleccion', 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $collection->imagen_destacada = $imagen_destacada;
        }
        
        if(request('foto_disenador')){
            $foto_disenador = $request->foto_disenador->store('uploads/coleccion', 'public');
            $img_2 = Image::make(public_path("storage/{$foto_disenador}"));
            $img_2->save();
            $collection->foto_disenador = $foto_disenador;
        }


        if($request->file('galeria')){
            $galerias = $request->file('galeria');
            $img_galeria = array();
            foreach ($galerias as $imagefile) {
                $imagefile = $imagefile->store('uploads/coleccion', 'public');
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
        $coleccion = Collection::findOrFail($request->id);
        
        if(request('imagen_destacada')){
            // Eliminar el logotipo
            $imagen_path = public_path("storage/{$coleccion->imagen_destacada}");
            if(File::exists($imagen_path) && $coleccion->imagen_destacada != null){
                unlink($imagen_path);
            }
            
            $imagen_destacada = $request->imagen_destacada->store('uploads/coleccion', 'public');
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

            $foto_disenador = $request->foto_disenador->store('uploads/coleccion', 'public');
            $img_2 = Image::make(public_path("storage/{$foto_disenador}"));
            $img_2->save();
            $coleccion->foto_disenador = $foto_disenador;
        }
        
        if($request->file('galeria')){
            $galerias = $request->file('galeria');
            $img_galeria = array();
            foreach ($galerias as $imagefile) {
                // Eliminar el logotipo
                $imagen_path = public_path("storage/{$coleccion->galeria}");
                if(File::exists($imagen_path) && $coleccion->galeria != null){
                    unlink($imagen_path);
                }

                $imagefile = $imagefile->store('uploads/coleccion', 'public');
                $img_2 = Image::make(public_path("storage/{$imagefile}"));
                $img_2->save();
                array_push($img_galeria, $imagefile);
            }
            $coleccion->img_galeria = json_encode($img_galeria);
        }

        $coleccion->nombre_disenador = $request->nombre_disenador;
        $coleccion->descripcion = $request->descripcion;
        $coleccion->nombre_coleccion = $request->nombre_coleccion;
        // Crear slug con funcion str::slug
        $coleccion->slug = Str::slug($request->nombre_disenador);
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

        $coleccion->delete();

        return response()->json(['status' => 'success', 'message' => 'Colección eliminada correctamente.']);
    }
}
