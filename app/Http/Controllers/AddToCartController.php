<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddToCartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    // Funcion para agregar productos al carrito
    public function addToCart(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->nombre_producto,
            'price' => $request->precio,
            'qty' => $request->cantidad,
            'weight' => 0,
            'options' => [
                'image' => $request->imagen_destacada,
                'description' => $request->descripcion,
            ]
        ]);

        return redirect()->back()->with(['message' => 'Producto agregado al carrito con éxito.', 'status' => 'success']);
    }

    // Metodo para actualizar la cantidad de productos en el carrito
    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->cantidad);

        return redirect()->back()->with(['message' => 'Carrito actualizado con éxito.', 'status' => 'success']);
    }

    // Metodo para eliminar productos del carrito
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back()->with(['message' => 'Producto eliminado del carrito con éxito.', 'status' => 'success']);
    }
}
