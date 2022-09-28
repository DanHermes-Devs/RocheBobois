<?php

namespace App\Http\Controllers;

use App\Models\Showroom;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ShowroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showrooms = Showroom::paginate(10);
        return view('admin.showrooms.index', compact('showrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.showrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $showroom = new Showroom;
        $showroom->slug = Str::slug($request->nombre_showroom);

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/showroom/'.$showroom->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $showroom->imagen_destacada = $imagen_destacada;
        }

        $showroom->nombre_showroom = $request->nombre_showroom;
        $showroom->ciudad_showroom = $request->ciudad_showroom;
        $showroom->numero_whatsapp = $request->numero_whatsapp;
        $showroom->mensaje_predeterminado_wp = $request->mensaje_predeterminado_wp;
        $showroom->numero_llamadas = $request->numero_llamadas;
        $showroom->iframe_google_maps = $request->iframe_google_maps;
        $showroom->direccion_showroom = $request->direccion_showroom;
        $showroom->como_llegar = $request->como_llegar;
        $showroom->id_tag_manager = $request->id_tag_manager;
        $showroom->save();

        return redirect()->route('showrooms')->with(['showroom' => $showroom, 'store' => 'Showroom creado correctamente.', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function show(Showroom $showroom, $slug)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Showroom $showroom, $id)
    {
        $showroom = Showroom::findOrFail($id);
        return view('admin.showrooms.edit', compact('showroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showroom $showroom)
    {
        $showroom = Showroom::findOrFail($request->id);

        if(request('imagen_destacada')){
            // Eliminar imagen anterior
            $imagen_path = public_path("storage/{$showroom->imagen_destacada}");
            if(File::exists($imagen_path) && $showroom->imagen_destacada != null){
                unlink($imagen_path);
            }

            $imagen_destacada = $request->imagen_destacada->store('uploads/showroom/'.$showroom->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $showroom->imagen_destacada = $imagen_destacada;
        }

        $showroom->nombre_showroom = $request->nombre_showroom;
        $showroom->ciudad_showroom = $request->ciudad_showroom;
        $showroom->numero_whatsapp = $request->numero_whatsapp;
        $showroom->mensaje_predeterminado_wp = $request->mensaje_predeterminado_wp;
        $showroom->numero_llamadas = $request->numero_llamadas;
        $showroom->iframe_google_maps = $request->iframe_google_maps;
        $showroom->direccion_showroom = $request->direccion_showroom;
        $showroom->como_llegar = $request->como_llegar;
        $showroom->id_tag_manager = $request->id_tag_manager;
        // Crear slug con funcion str::slug
        $showroom->slug = Str::slug($request->nombre_showroom);
        $showroom->save();

        return redirect()->route('edit.showroom', $showroom->id)->with(['showroom' => $showroom, 'store' => 'Showroom actualizado correctamente.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Showroom $showroom, $id)
    {
        $showroom = Showroom::findOrFail($id);

        // Eliminar imagen anterior
        $imagen_path = public_path("storage/{$showroom->imagen_destacada}");
        if(File::exists($imagen_path)){
            if($showroom->imagen_destacada != null){
                unlink($imagen_path);
            }
        }

        // Eliminar carpeta de imagenes
        $carpeta_path = public_path("storage/uploads/showroom/{$showroom->slug}");
        if(File::exists($carpeta_path)){
            File::deleteDirectory($carpeta_path);
        }

        $showroom->delete();

        return response()->json(['showroom' => $showroom, 'store' => 'Showroom eliminado correctamente.', 'status' => 'success']);
    }
}
