<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::paginate(10);
        return view('admin.bookings.index', compact('bookings'));
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
        $validate = $request->validate([
            'nombre_usuario' => 'required',
            'email_usuario' => 'required',
            'telefono_usuario' => 'required',
            'hora' => 'required',
            'fecha' => 'required',
        ], [
            'nombre_usuario.required' => 'El nombre es obligatorio',
            'email_usuario.required' => 'El email es obligatorio',
            'telefono_usuario.required' => 'El teléfono es obligatorio',
            'hora.required' => 'La hora es obligatoria',
            'fecha.required' => 'La fecha es obligatoria',
        ]);

        if($validate) {
            if($request->ajax()) {
                $booking = new Booking();
                $booking->id_user = $request->id_user;
                $booking->id_event = $request->id_event;
                $booking->nombre_evento = $request->nombre_evento;
                $booking->nombre_usuario = $request->nombre_usuario;
                $booking->email_usuario = $request->email_usuario;
                $booking->telefono_usuario = $request->telefono_usuario;
                // Convertir la hora de 24h a 12h
                $hora = date('h:i A', strtotime($request->hora));
                $booking->hora = $hora;
                $booking->fecha = $request->fecha;
                $booking->codigo_reserva = $request->codigo_reserva;

                // Generar un codigo QR y guardarlo en la carpeta public
                QrCode::format('png')->margin(1)->size(500)->generate('rocheboboismexico.com/reserva/'.$request->codigo_reserva, public_path('storage/uploads/qr_codes_reservations/'.$request->codigo_reserva.'.png'));


                $booking->save();
    
                return response()->json([
                    'message' => 'Reserva realizada correctamente',
                    'status' => 'success',
                ]);
            }
        }else{
            return response()->json([
                'message' => 'Error al realizar la reserva',
                'status' => $validate,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking, $id)
    {
        $booking = Booking::where('id', $id)->first();
        $user = User::where('id', $booking->id_user)->first();
        return view('admin.bookings.show', compact('booking', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    public function checkin(Request $request, $id)
    {
        $booking = Booking::where('id', $id)->first();
        $booking->status = $request->confirmado;
        $booking->save();

        return redirect()->route('bookings')->with(['store' => 'Check-in Actualizado con Éxito.', 'status' => 'success']);
    }

    public function checkin_page(Request $request, $codigo_reserva)
    {
        // Si el usuario no esta logueado, redireccionar a la pagina de login
        if(!auth()->check()) {
            return redirect()->route('login');
        }else{
            $booking = Booking::where('codigo_reserva', $codigo_reserva)->first();
            $booking->status = "Confirmado";
            $booking->save();
            return view('admin.bookings.checkin', compact('booking'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking, $id)
    {
        $booking = Booking::where('id', $id)->first();

        $imagen_path = public_path("storage/uploads/qr_codes_reservations/{$booking->codigo_reserva}.png");
        if(File::exists($imagen_path) && $booking->codigo_reserva != null) {
            unlink($imagen_path);
        }

        $booking->delete();

        return response()->json([
            'message' => 'Reserva eliminada correctamente',
            'status' => 'success',
        ]);
    }
}
