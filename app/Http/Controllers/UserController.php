<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Regresar a los usuarios con rol cliente y con estado activo en un datatable
        $clientes = User::role('cliente')->get();
        if(request()->ajax()) {
            return datatables()
                ->of($clientes)
                ->addColumn('action', 'admin.usuarios.actions')
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('admin.usuarios.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retornamos la informacion del usuario con el id que se envia
        $user = User::find($id);
        return view('admin.usuarios.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminamos al usuario con el id que se envia
        $user = User::find($id);
        $user->delete();
        return response()->json(['success' => 'Usuario eliminado correctamente', 'status' => 'success']);
    }

    public function exportUsers()
    {
        // Exportamos los usuarios con rol cliente a un archivo excel
        return Excel::download(new UsersExport, 'Usuarios'.date('d-m-Y').'.xlsx');
    }
}
