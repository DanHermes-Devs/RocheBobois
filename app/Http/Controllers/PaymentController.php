<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Mostrar lo que hay en el carrito 
        $cart = Cart::content();

        $user = User::find($request->user_id);
        $stripeCharge = $user->charge($request->total * 100, $request->token, [
            'currency' => 'usd',
            'metadata' => [
                'Nombre Completo' => $request->nombre_completo,
                'Correo Electrónico' => $request->email,
                'Teléfono' => $request->telefono,
                'Dirección Principal' => $request->direccion_principal,
                'Dirección Secundaria' => $request->direccion_opcional,
                'País' => $request->pais,
                'Estado' => $request->estado,
                'Código Postal' => $request->codigo_postal,
                'Información Adicional' => $request->informacion_adicional,
                'order_no' => uniqid(),
            ],
            'description' => 'Compra de productos en Roche Bobois México',
        ]);

        $order_id = Order::insertGetId([
            'user_id' => $request->user_id,
            'total' => $request->total,
            'nombre_completo' => $request->nombre_completo,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion_principal' => $request->direccion_principal,
            'direccion_opcional' => $request->direccion_opcional,
            'pais' => $request->pais,
            'estado' => $request->estado,
            'codigo_postal' => $request->codigo_postal,
            'informacion_adicional' => $request->informacion_adicional,
            'payment_type' => "Stripe",
            'payment_method' => "Stripe",
            'payment_id' => $stripeCharge->payment_method,
            'transaction_id' => $stripeCharge->balance_transaction,
            'currency' => $stripeCharge->currency,
            'order_no' => $stripeCharge->metadata->order_no,
            'invoice_no' => "RBMX" . mt_rand(100000000, 999999999),
            'created_at' => now(),
        ]);

        $carts = Cart::content();

        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'price' => $cart->price,
                'quantity' => $cart->qty,
                'created_at' => now(),
            ]);
        }

        Cart::destroy();

        $payment = new Payment;
        $payment->user_id = $request->user_id;
        $payment->total = $request->total;
        $payment->save();

        return response()->json([
            'message' => 'Pago realizado con éxito',
            'payment' => $payment,
        ]);
    }
}
