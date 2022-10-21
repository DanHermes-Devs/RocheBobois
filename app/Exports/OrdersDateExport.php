<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
// WhitStyles
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrdersDateExport implements FromCollection, WithCustomStartCell, WithHeadings, shouldAutoSize, WithStyles
{
    // Exportar por fecha
    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
    {
        // Primero traemos todos los productos
        $products = Product::all();

        // Despues tramos las ordenes donde la fecha de creacion sea mayor o igual a la fecha de inicio y menor o igual a la fecha de fin
        $orders = Order::whereBetween('created_at', [$this->start_date, $this->end_date])->get();

        // Traemos la informacion del usuario que hizo la orden
        $users = Order::with('user')->get();

        // Despues traemos todos los items de las ordenes
        $orderItems = OrderItem::all();

        // Creamos un array vacio
        $ordersArray = [];

        // Recorremos todas las ordenes
        foreach ($orders as $order) {
            // Creamos un array vacio
            $orderArray = [];

            // Agregamos los datos de la orden al array
            $orderArray['id'] = $order->id;
            $orderArray['nombre'] = $users->where('id', $order->id)->first()->user->name;
            $orderArray['email'] = $users->where('id', $order->id)->first()->user->email;
            $orderArray['telefono'] = $users->where('id', $order->id)->first()->user->telefono;
            $orderArray['direccion'] = $order->direccion_principal;
            $orderArray['pais'] = $order->pais;
            $orderArray['estado'] = $order->estado;
            $orderArray['codigo_postal'] = $order->codigo_postal;
            // Convertimos el total en formato de moneda
            $orderArray['total'] = '$' . number_format($order->total, 2);
            $orderArray['created_at'] = $order->created_at->format('d-m-Y');

            // Recorremos todos los productos de las ordenes
            foreach ($orderItems as $order_item) {
                // Si el id de la orden es igual al id de la orden del producto
                if ($order->id == $order_item->order_id) {
                    // Recorremos todos los productos
                    foreach ($products as $product) {
                        // Si el id del producto es igual al id del producto de la orden
                        if ($product->id == $order_item->product_id) {
                            // Agregamos los datos del producto al array
                            $orderArray['producto'] = $product->nombre_producto;
                            // Convertimos el precio en formato de moneda
                            $orderArray['precio'] = '$' . number_format($product->precio, 2);
                            $orderArray['cantidad'] = $order_item->quantity;
                        }
                    }
                }
            }

            // Agregamos el array a la coleccion
            $ordersArray[] = $orderArray;
        }

        // Retorna la coleccion
        return collect($ordersArray);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre completo',
            'Email',
            'Telefono',
            'Direccion',
            'País',
            'Estado',
            'Codigo Postal',
            'Total',
            'Fecha',
            'Producto',
            'Precio',
            'Cantidad',
        ];
    }

    public function startCell(): string
    {
        return 'A1';
    }

    public function title(): string
    {
        return 'Ordenes';
    }

    public function styles(Worksheet $sheet)
    {
        // Cambiar el nombre de la hoja
        $sheet = $sheet->setTitle('Ordenes');

        // Cambiar la fuentes de la hoja
        $sheet->getStyle('A1:M1')->applyFromArray([
            'font' => [
                'name' => 'Arial',
                'size' => 14,
                'bold' => true,
                // Color de letra blanco
                'color' => ['argb' => 'FFFFFFFF'],
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
            'fill' => [
                'fillType' => 'solid',
                // Color de fondo negro
                'startColor' => ['argb' => 'FF000000'],
            ],
        ]);

        $sheet->getStyle('A1:M' . $sheet->getHighestRow())->applyFromArray([
            'font' => [
                'name' => 'Arial',
                'size' => 12,
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                ],
            ]
        ]);
    }

}