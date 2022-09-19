<?php

namespace App\Http\Controllers;

use App\Mail\Contacto;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensajes = Contact::paginate(10);
        return view('admin.contacto.index', compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contacto = new Contact;
        $contacto->nombre_completo = $request->nombre_completo;
        $contacto->correo_electronico = $request->correo_electronico;
        $contacto->telefono = $request->telefono;
        $contacto->sucursal = $request->sucursal;
        $contacto->productos_interesado = $request->productos_interesado;
        $contacto->newsletter = $request->newsletter;
        $contacto->save();

        // Enviar email
        Mail::to('danhermes2019@outlook.com')->send(
            new Contacto(
                $request->nombre_completo, 
                $request->correo_electronico, 
                $request->telefono, 
                $request->sucursal, 
                $request->productos_interesado, 
                $request->newsletter
            )
        );

        return redirect()->route('front.contacto')->with('success', 'Mensaje enviado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
