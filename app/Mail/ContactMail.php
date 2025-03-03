<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactMail extends Mailable
{
    public $data;

    /**
     * Crear una nueva instancia de mensaje de correo.
     *
     * @param  array  $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Construir el mensaje.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact')
                    ->with([
                        'nombre' => $this->data['nombre'],
                        'email' => $this->data['email'],
                        'mensaje' => $this->data['mensaje'],
                    ])
                    ->subject('Nuevo mensaje de contacto');
    }
}
