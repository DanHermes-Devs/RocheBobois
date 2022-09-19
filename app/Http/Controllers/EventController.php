<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
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
        return view('admin.eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Event;

        if(request('imagen_destacada')){
            $imagen_destacada = $request->imagen_destacada->store('uploads/evento', 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $evento->imagen_destacada = $imagen_destacada;
        }

        $evento->nombre_evento = $request->nombre_evento;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
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
        return view('admin.eventos.edit', compact('evento'));
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
        $evento = Event::find($request->id);
        if(request('imagen_destacada')){
            // Eliminar primero imagen anterior
            $imagen_path = public_path("storage/{$evento->imagen_destacada}");
            if(File::exists($imagen_path) && $evento->imagen_destacada != null){
                unlink($imagen_path);
            }
            
            $imagen_destacada = $request->imagen_destacada->store('uploads/evento', 'public');
            $img_1 = Image::make(public_path("storage/{$imagen_destacada}"));
            $img_1->save();
            $evento->imagen_destacada = $imagen_destacada;
        }
        $evento->nombre_evento = $request->nombre_evento;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
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
        $imagen_path = public_path("storage/{$evento->imagen_destacada}");
        if(File::exists($imagen_path)){
            if($evento->imagen_destacada != null){
                unlink($imagen_path);
            }
        }
        $evento->delete();
        return response()->json(['status' => 'success', 'message' => 'Evento eliminado correctamente.']);
    }
}
