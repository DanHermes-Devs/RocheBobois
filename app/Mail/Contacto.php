<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contacto extends Mailable
{
    use Queueable, SerializesModels;

    public string $nombre_completo;
    public string $correo_electronico;
    public string $telefono;
    public string $sucursal;
    public string $productos_interesado;
    public string $newsletter;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $nombre_completo, string $correo_electronico, string $telefono, string $sucursal, string $productos_interesado, string $newsletter)
    {
        $this->nombre_completo = $nombre_completo;
        $this->correo_electronico = $correo_electronico;
        $this->telefono = $telefono;
        $this->sucursal = $sucursal;
        $this->productos_interesado = $productos_interesado;
        $this->newsletter = $newsletter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->subject('Nuevo mensaje de contacto')
                ->markdown('mail.contacto');
    }
}
