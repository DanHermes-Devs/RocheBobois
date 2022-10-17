<?php

namespace App\Http\Controllers;

use App\Models\Congiruation;
use Illuminate\Http\Request;

class CongiruationController extends Controller
{
    // Retornamos la vista de aviso de privacidad
    public function aviso_privacidad()
    {
        // Query builder a congiruations
        $aviso_privacidad = Congiruation::select('aviso_privacidad')->first();
        return view('admin.configuraciones.aviso', compact('aviso_privacidad'));
    }
    

    public function update_aviso_privacidad(Request $request, $id)
    {
        // Query builder a congiruations
        $aviso_privacidad = Congiruation::find($id);

        // Actualizamos el campo aviso_privacidad
        $aviso_privacidad->aviso_privacidad = $request->aviso_privacidad;
        $aviso_privacidad->save();

        return redirect()->route('aviso_privacidad')->with('status', 'Aviso de privacidad actualizado correctamente');
    }
    
    // Retornamos la vista de aviso de privacidad
    public function terminos_condiciones()
    {
        // Query builder a congiruations
        $terminos_condiciones = Congiruation::select('terminos_condiciones')->first();
        return view('admin.configuraciones.terms', compact('terminos_condiciones'));
    }
    

    public function update_terminos_condiciones(Request $request, $id)
    {
        // Query builder a congiruations
        $terminos_condiciones = Congiruation::find($id);

        // Actualizamos el campo terminos_condiciones
        $terminos_condiciones->terminos_condiciones = $request->terminos_condiciones;
        $terminos_condiciones->save();

        return redirect()->route('terminos_condiciones')->with('status', 'Términos y condiciones actualizado correctamente');
    }
}
