<?php

namespace App\Http\Controllers;

use App\Models\HomeOffice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class HomeOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeOffices = HomeOffice::all();

        if (request()->ajax()) {
            return DataTables()
                ->of($homeOffices)
                ->addColumn('action', 'admin.home-office.actions')
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('admin.home-office.index', compact('homeOffices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home-office.create');
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

        $homeOffice = new HomeOffice();
        $homeOffice->slug = Str::slug($request->nombre);

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/categorias-home-office/'.$homeOffice->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $homeOffice->imagen_destacada = $imagen_destacada;
        }

        $homeOffice->nombre = $request->nombre;
        $homeOffice->save();

        return redirect()->route('home-office')->with(['home-office' => $homeOffice, 'store' => 'Categoría creada correctamente.', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeOffice  $homeOffice
     * @return \Illuminate\Http\Response
     */
    public function show(HomeOffice $homeOffice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeOffice  $homeOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeOffice $homeOffice, $id)
    {
        $homeOffice = HomeOffice::find($id);
        return view('admin.home-office.edit', compact('homeOffice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeOffice  $homeOffice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeOffice $homeOffice)
    {
        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
        ]);

        $homeOffice = HomeOffice::find($request->id);


        if(request('imagen_destacada')){
            // Eliminar primero imagen anterior
            $imagen_path = public_path("storage/{$homeOffice->imagen_destacada}");
            if(File::exists($imagen_path) && $homeOffice->imagen_destacada != null){
                unlink($imagen_path);
            }

            $imagen_destacada = $request->imagen_destacada->store('uploads/categorias-home-office/'.$homeOffice->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $homeOffice->imagen_destacada = $imagen_destacada;
        }

        $homeOffice->nombre = $request->nombre;
        $homeOffice->save();

        return redirect()->route('home-office')->with(['home-office' => $homeOffice, 'store' => 'Categoría actualizada correctamente.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeOffice  $homeOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeOffice $homeOffice, $id)
    {
        $homeOffice = HomeOffice::find($id);

        // Eliminar imagen
        $imagen_path = public_path("storage/{$homeOffice->imagen_destacada}");
        if(File::exists($imagen_path) && $homeOffice->imagen_destacada != null){
            unlink($imagen_path);
        }

        // Eliminar carpeta de la categoría
        $carpeta_path = public_path("storage/uploads/categorias-home-office/{$homeOffice->slug}");
        if(File::exists($carpeta_path) && $homeOffice->slug != null){
            File::deleteDirectory($carpeta_path);
        }

        $homeOffice->delete();

        return response()->json(['status' => 'success', 'message' => 'Categoría eliminada correctamente.']);
    }
}
