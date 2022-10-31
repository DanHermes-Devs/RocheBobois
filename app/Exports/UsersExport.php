<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $clientes = User::role('cliente')->get();
        
        $clienteArray = [];

        foreach ($clientes as $cliente) {
            $clienteArray = [];

            $clienteArray['id'] = $cliente->id;
            $clienteArray['name'] = $cliente->name;
            $clienteArray['email'] = $cliente->email;
            $clienteArray['empresa'] = $cliente->empresa;
            $clienteArray['cargo'] = $cliente->cargo;
            $clienteArray['pais'] = $cliente->pais;
            $clienteArray['estado'] = $cliente->estado;
            $clienteArray['codigo_postal'] = $cliente->codigo_postal;
            $clienteArray['telefono'] = $cliente->telefono;
            $clienteArray['created_at'] = $cliente->created_at->format('d-m-Y');
            $clienteArray['stripe_id'] = $cliente->stripe_id;

            $clientesArray[] = $clienteArray;
        }

        return collect($clientesArray);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Email',
            'Empresa',
            'Cargo',
            'Pais',
            'Estado',
            'Codigo Postal',
            'Telefono',
            'Fecha de Registro',
            'ID de Stripe',
        ];
    }
}
