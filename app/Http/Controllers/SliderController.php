<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new Slider;

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/slider', 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $slider->imagen_destacada = $imagen_destacada;
        }

        $slider->nombre_disenador = $request->nombre_disenador;
        $slider->nombre_producto = $request->nombre_producto;
        $slider->save();

        return redirect()->route('sliders')->with(['slider' => $slider, 'store' => 'Slider creado correctamente.', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider, $id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $slider = Slider::findOrFail($request->id);

        if(request('imagen_destacada')){
            // Eliminar imagen anterior
            $imagen_path = public_path("storage/{$slider->imagen_destacada}");
            if(File::exists($imagen_path) && $slider->imagen_destacada != null){
                unlink($imagen_path);
            }

            $imagen_destacada = $request->imagen_destacada->store('uploads/slider', 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $slider->imagen_destacada = $imagen_destacada;
        }

        $slider->nombre_disenador = $request->nombre_disenador;
        $slider->nombre_producto = $request->nombre_producto;
        $slider->save();

        return redirect()->route('edit.slider', $slider->id)->with(['slider' => $slider, 'store' => 'Slider actualizado correctamente.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider, $id)
    {
        $slider = Slider::findOrFail($id);

        // Eliminar imagen anterior
        $imagen_path = public_path("storage/{$slider->imagen_destacada}");
        if(File::exists($imagen_path)){
            if($slider->imagen_destacada != null){
                unlink($imagen_path);
            }
        }

        $slider->delete();

        return response()->json(['slider' => $slider, 'store' => 'Slider eliminado correctamente.', 'status' => 'success']);
    }
}