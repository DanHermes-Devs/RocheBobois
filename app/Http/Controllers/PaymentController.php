<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\Payment;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
            'payment_method' => "Tarjeta de Crédito o Débito",
            'payment_id' => $stripeCharge->payment_method,
            'transaction_id' => $stripeCharge->id,
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

        // Enviar el correo con la información de la compra
        $invoice = Order::findOrFail($order_id);
        $itemsOrder = OrderItem::where('order_id', $order_id)->get();

        // Buscar los productos que se compraron
        $products = Product::whereIn('id', $itemsOrder->pluck('product_id'))->get();
        
        $prods = [];
        foreach($products as $product){
            $prods[$product->id] = $product;

            // Mostrar la cantidad
            $prods[$product->id]->quantity = $itemsOrder->where('product_id', $product->id)->first()->quantity;
        }
        
        $data = [
            'invoice' => $invoice->invoice_no,
            'total' => $invoice->total,
            'nombre_completo' => $invoice->nombre_completo,
            'email' => $invoice->email,
            'telefono' => $invoice->telefono,
            'direccion_principal' => $invoice->direccion_principal,
            'direccion_opcional' => $invoice->direccion_opcional,
            'pais' => $invoice->pais,
            'estado' => $invoice->estado,
            'codigo_postal' => $invoice->codigo_postal,
            'informacion_adicional' => $invoice->informacion_adicional,
            'payment_type' => $invoice->payment_type,
            'payment_method' => $invoice->payment_method,
            'payment_id' => $invoice->payment_id,
            'transaction_id' => $invoice->transaction_id,
            'currency' => $invoice->currency,
            'order_no' => $invoice->order_no,
            'created_at' => $invoice->created_at,
            'prods' => $prods,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        $payment = new Payment;
        $payment->user_id = $request->user_id;
        $payment->total = $request->total;
        $payment->save();

        // Cart::destroy();

        // Mandar a la pagina de agradecimiento, resumen de la compra y el correo a el cliente
        return response()->json([
            'status' => 'success',
            'message' => 'Gracias por tu compra, te hemos enviado un correo con la información de tu compra.',
            'data' => $stripeCharge,
            'carts' => $carts,
        ]);
    }
}
