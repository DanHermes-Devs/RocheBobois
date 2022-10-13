<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Laravel\Cashier\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Auth::user()->invoicesIncludingPending();
    
        $usuario = Auth::user();
        // Mostrar las ordenes del usuario
        $orders = Order::with(['orderItems'])->where('user_id', $usuario->id)->get();
        

        return view('perfil.index', compact('usuario', 'orders', 'invoices'));
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
        //
    }

    public function viewOrder($id)
    {
        // Relacionar las ordenes con los items y la informacion de los productos
        $order = Order::with(['orderItems', 'user'])->where('id', $id)->first();

        // Relacionar el producto con el OrderItem
        $orderItems = OrderItem::with('product')->where('order_id', $order->id)->first();

        return view('perfil.order', compact('order', 'orderItems'));
    }

    public function printOrder($id)
    {
        // Relacionar las ordenes con los items y la informacion de los productos
        $order = Order::with(['orderItems', 'user'])->where('id', $id)->where('user_id', Auth::user()->id)->first();

        // Relacionar el producto con el OrderItem
        $orderItems = OrderItem::with('product')->where('order_id', $order->id)->first();

        $pdf = Pdf::loadView('perfil.print', compact('order', 'orderItems'));
        return $pdf->download('Orden_'.$order->order_no . '.pdf');

        // return view('perfil.print', compact('order', 'orderItems'));
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
        // Vamos a editar los datos del usuario
        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->empresa = $request->empresa;
        $usuario->cargo = $request->cargo;
        $usuario->pais = $request->pais;
        $usuario->estado = $request->estado;
        $usuario->codigo_postal = $request->codigo_postal;
        $usuario->telefono = $request->telefono;
        $usuario->save();

        return redirect()->route('perfil')->with('mensaje', 'Perfil actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
