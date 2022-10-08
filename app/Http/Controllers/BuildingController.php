<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\BuildingCategory;
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
        $buildings = Building::all();
        
        if (request()->ajax()) {
            return DataTables()
                ->of($buildings)
                ->addColumn('action', 'admin.building.actions')
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->make();
        }

        return view('admin.building.index', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildingCategorias = BuildingCategory::all();
        return view('admin.building.create', compact('buildingCategorias'));
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
            'nombre_hotel' => 'required',
            'categoria_id' => 'required|integer',
            'descripcion' => 'required',
            'imagen_destacada' => 'required|image|mimes:jpeg,png,jpg',
        ], [
            'nombre_hotel.required' => 'El nombre del hotel es requerido',
            'categoria_id.required' => 'La categoría del hotel es requerida',
            'categoria_id.integer' => 'La categoría del hotel debe ser un número entero',
            'descripcion.required' => 'La descripción del hotel es requerida',
            'imagen_destacada.required' => 'La imagen del hotel es requerida',
            'imagen_destacada.image' => 'El archivo debe ser una imagen',
            'imagen_destacada.mimes' => 'El archivo debe ser una imagen en formato jpeg, png o jpg',
        ]);

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
                $img_2 = Image::make(public_path("storage/{$imagefile}"));
                $img_2->save();
                array_push($img_galeria, $imagefile);
            }
            $building->galeria = json_encode($img_galeria);
        }

        $building->nombre_hotel = $request->nombre_hotel;
        $building->descripcion = $request->descripcion;
        $building->categoria_id = $request->categoria_id;
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
        $buildingCategorias = BuildingCategory::all();
        return view('admin.building.edit', compact('building', 'buildingCategorias'));
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
        $request->validate([
            'nombre_hotel' => 'required',
            'categoria_id' => 'required|integer',
            'descripcion' => 'required',
        ], [
            'nombre_hotel.required' => 'El nombre del hotel es requerido',
            'categoria_id.required' => 'La categoría del hotel es requerida',
            'categoria_id.integer' => 'La categoría del hotel debe ser un número entero',
            'descripcion.required' => 'La descripción del hotel es requerida',
        ]);

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
        $building->descripcion = $request->descripcion;
        $building->categoria_id = $request->categoria_id;
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
