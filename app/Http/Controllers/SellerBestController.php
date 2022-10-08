<?php

namespace App\Http\Controllers;

use App\Models\SellerBest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SellerBestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellerBests = SellerBest::all();

        if (request()->ajax()) {
            return DataTables()
                ->of($sellerBests)
                ->addColumn('action', 'admin.best-seller.actions')
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('admin.best-seller.index', compact('sellerBests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.best-seller.create');
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

        $bestSeller = new SellerBest();
        $bestSeller->slug = Str::slug($request->nombre);

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/categorias-best-seller/'.$bestSeller->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $bestSeller->imagen_destacada = $imagen_destacada;
        }

        $bestSeller->nombre = $request->nombre;
        $bestSeller->save();

        return redirect()->route('back.best-seller')->with(['back.best-seller' => $bestSeller, 'store' => 'Categoría creada correctamente.', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellerBest  $sellerBest
     * @return \Illuminate\Http\Response
     */
    public function show(SellerBest $sellerBest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellerBest  $sellerBest
     * @return \Illuminate\Http\Response
     */
    public function edit(SellerBest $sellerBest, $id)
    {
        $sellerBest = SellerBest::find($id);
        return view('admin.best-seller.edit', compact('sellerBest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellerBest  $sellerBest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellerBest $sellerBest)
    {
        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
        ]);

        $bestSeller = SellerBest::find($request->id);


        if(request('imagen_destacada')){
            // Eliminar primero imagen anterior
            $imagen_path = public_path("storage/{$bestSeller->imagen_destacada}");
            if(File::exists($imagen_path) && $bestSeller->imagen_destacada != null){
                unlink($imagen_path);
            }

            $imagen_destacada = $request->imagen_destacada->store('uploads/categorias-best-seller/'.$bestSeller->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $bestSeller->imagen_destacada = $imagen_destacada;
        }

        $bestSeller->nombre = $request->nombre;
        $bestSeller->save();

        return redirect()->route('back.best-seller')->with(['back.best-seller' => $bestSeller, 'store' => 'Categoría actualizada correctamente.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellerBest  $sellerBest
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellerBest $sellerBest, $id)
    {
        $homeOffice = SellerBest::find($id);

        // Eliminar imagen
        $imagen_path = public_path("storage/{$homeOffice->imagen_destacada}");
        if(File::exists($imagen_path) && $homeOffice->imagen_destacada != null){
            unlink($imagen_path);
        }

        // Eliminar carpeta de la categoría
        $carpeta_path = public_path("storage/uploads/categorias-best-seller/{$homeOffice->slug}");
        if(File::exists($carpeta_path) && $homeOffice->slug != null){
            File::deleteDirectory($carpeta_path);
        }

        $homeOffice->delete();

        return response()->json(['status' => 'success', 'message' => 'Categoría eliminada correctamente.']);
    }
}
