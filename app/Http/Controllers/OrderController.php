<?php

namespace App\Http\Controllers;

use App\Exports\OrdersDateExport;
use App\Exports\OrdersExport;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
                // Formatear el created_at
                ->editColumn('created_at', function ($data) {
                    return $data->created_at->format('d-m-Y');
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.orders.index', compact('ordenes'));
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

    // Exportar archivo
    public function exportOrders()
    {
        return Excel::download(new OrdersExport, 'Ordenes.xlsx');   
    }

    // Exportar por fecha
    public function exportOrdersByDate(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        return Excel::download(new OrdersDateExport($start_date, $end_date), 'Ordenes'.$start_date.'-'.$end_date.'.xlsx');
    }
}
