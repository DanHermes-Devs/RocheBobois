<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::paginate(10);
        return view('admin.building.index', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.building.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $building = new Building;
        $building->slug = Str::slug($request->nombre_hotel);

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/buildings/'.$building->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $building->imagen_destacada = $imagen_destacada;
        }

        if($request->file('galeria')){
            $galerias = $request->file('galeria');
            $img_galeria = array();
            foreach ($galerias as $imagefile) {
                $imagefile = $imagefile->store('uploads/buildings/'.$building->slug, 'public');
                $img_2 = Image::make(public_path("storage/{$imagefile}"))->fit(1920, 1080);
                $img_2->save();
                array_push($img_galeria, $imagefile);
            }
            $building->galeria = json_encode($img_galeria);
        }

        $building->nombre_hotel = $request->nombre_hotel;
        $building->categoria = $request->categoria;
        $building->descripcion = $request->descripcion;
        $building->save();

        return redirect()->route('building')->with(['building' => $building, 'store' => 'Building creado correctamente.', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building, $id)
    {
        $building = Building::findOrFail($id);
        return view('admin.building.edit', compact('building'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        $building = Building::findOrFail($request->id);

        if(request('imagen_destacada')){
            // Eliminar imagen anterior
            $imagen_path = public_path("storage/{$building->imagen_destacada}");
            if(File::exists($imagen_path) && $building->imagen_destacada != null){
                unlink($imagen_path);
            }

            $imagen_destacada = $request->imagen_destacada->store('uploads/buildings/'.$building->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $building->imagen_destacada = $imagen_destacada;
        }

        $building->nombre_hotel = $request->nombre_hotel;
        $building->categoria = $request->categoria;
        $building->descripcion = $request->descripcion;
        $building->save();

        return redirect()->route('edit.building', $building->id)->with(['colecbuildingcion' => $building, 'store' => 'Building actualizado correctamente.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building, $id)
    {
        $building = Building::findOrFail($id);

        // Eliminar imagen anterior
        $imagen_path = public_path("storage/{$building->imagen_destacada}");
        if(File::exists($imagen_path)){
            if($building->imagen_destacada != null){
                unlink($imagen_path);
            }
        }

        // Eliminar imagenes de la galeria
        $galeria = json_decode($building->galeria);
        foreach ($galeria as $image) {
            $imagen_path = public_path("storage/{$image}");
            if(File::exists($imagen_path)){
                unlink($imagen_path);
            }
        }

        // Eliminar la carpeta de imagenes
        $carpeta = public_path("storage/uploads/buildings/{$building->slug}");
        if(File::exists($carpeta)){
            File::deleteDirectory($carpeta);
        }

        $building->delete();

        return response()->json(['status' => 'success', 'message' => 'Building eliminado correctamente.']);
    }
}
