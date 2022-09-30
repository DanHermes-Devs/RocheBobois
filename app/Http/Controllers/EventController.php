<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EventCategory;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Event::paginate(10);
        return view('admin.eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = EventCategory::all();
        return view('admin.eventos.create', compact('categorias'));
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
            'nombre_evento' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'imagen_destacada' => 'required|image|mimes:jpeg,png,jpg',
            'categoria_id' => 'required|integer',
        ], [
            'nombre_evento.required' => 'El nombre del evento es requerido',
            'descripcion.required' => 'La descripción del evento es requerida',
            'fecha.required' => 'La fecha del evento es requerida',
            'hora.required' => 'La hora del evento es requerida',
            'imagen_destacada.required' => 'La imagen del evento es requerida',
            'imagen_destacada.image' => 'El archivo debe ser una imagen',
            'imagen_destacada.mimes' => 'El archivo debe ser una imagen en formato jpeg, png o jpg',
            'categoria_id.required' => 'La categoría del evento es requerida',
            'categoria_id.integer' => 'La categoría del evento debe ser un número entero',
        ]);

        $evento = new Event;

        $evento->slug = Str::slug($request->nombre_evento);

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/evento/'.$evento->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $evento->imagen_destacada = $imagen_destacada;
        }

        $evento->nombre_evento = $request->nombre_evento;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
        $evento->categoria_id = $request->categoria_id ?? null;
        $evento->save();

        return redirect()->route('eventos')->with(['evento' => $evento, 'store' => 'Evento creado correctamente.', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event, $id)
    {
        $evento = Event::find($id);
        $categorias = EventCategory::all();
        return view('admin.eventos.edit', compact('evento', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'nombre_evento' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'categoria_id' => 'required|integer',
        ], [
            'nombre_evento.required' => 'El nombre del evento es requerido',
            'descripcion.required' => 'La descripción del evento es requerida',
            'fecha.required' => 'La fecha del evento es requerida',
            'hora.required' => 'La hora del evento es requerida',
            'categoria_id.required' => 'La categoría del evento es requerida',
        ]);

        $evento = Event::find($request->id);
        $evento->slug = Str::slug($request->nombre_evento);

        if(request('imagen_destacada')){
            // Eliminar primero imagen anterior
            $imagen_path = public_path("storage/{$evento->imagen_destacada}");
            if(File::exists($imagen_path) && $evento->imagen_destacada != null){
                unlink($imagen_path);
            }
            
            $imagen_destacada = $request->imagen_destacada->store('uploads/evento/'.$evento->slug, 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $evento->imagen_destacada = $imagen_destacada;
        }
        $evento->nombre_evento = $request->nombre_evento;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
        $evento->categoria_id = $request->categoria_id ?? null;
        $evento->save();

        return redirect()->route('edit.evento', $evento->id)->with(['evento' => $evento, 'store' => 'Evento actualizado correctamente.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, $id)
    {
        $evento = Event::findOrFail($id);

        // Eliminamos la imagen destacada
        $imagen_path = public_path("storage/{$evento->imagen_destacada}");
        if(File::exists($imagen_path)){
            if($evento->imagen_destacada != null){
                unlink($imagen_path);
            }
        }

        // Eliminamos la carpeta del evento
        $carpeta_path = public_path("storage/uploads/evento/{$evento->slug}");
        if(File::exists($carpeta_path)){
            File::deleteDirectory($carpeta_path);
        }

        $evento->delete();
        return response()->json(['status' => 'success', 'message' => 'Evento eliminado correctamente.']);
    }
}
