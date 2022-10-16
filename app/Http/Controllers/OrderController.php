<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes = Order::all();

        

        if (request()->ajax()) {
            return datatables()->of($ordenes)
                ->addColumn('action', 'admin.orders.actions')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.orders.index', compact('ordenes'));
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
        // Relacionar las ordenes con los items y la informacion de los productos
        $order = Order::with(['orderItems', 'user'])->where('id', $id)->first();

        // Relacionar el producto con el OrderItem
        $orderItems = OrderItem::with('product')->where('order_id', $id)->first();

        return view('admin.orders.show', compact('order', 'orderItems'));
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
        $order = Order::find($id);

        $order->status = $request->status;
        $order->save();

        return response()->json(['success' => 'Estado cambiado correctamente.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Borramos la orden
        Order::find($id)->delete();

        return response()->json(['success' => 'Orden eliminada correctamente.', 'status' => 'success']);
    }
}
