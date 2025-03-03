<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    // Mostrar el form
    public function index()
    {
        return view('contact');
    }

    // Enviar
    public function send(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mensaje' => 'required|string',
        ]);

        $nombre = $request->nombre;
        $email = $request->email;
        $mensaje = $request->mensaje;

        // Crear el objeto del correo con los datos
        $data = [
            'nombre' => $nombre,
            'email' => $email,
            'mensaje' => $mensaje,
        ];

        // Intentar enviar el correo
        try {
            // Enviar el correo utilizando el Mailable
            Mail::to('casamianquinteropablo@gmail.com')->send(new ContactMail($data));
        
            // Redirigir con mensaje de éxito
            return redirect()->route('contact')->with('success', '¡Tu mensaje ha sido enviado correctamente!');
        } catch (\Exception $e) {
            // Redirigir con mensaje de error si falla
            return redirect()->route('contact')->with('error', 'Hubo un error al enviar tu mensaje: ' . $e->getMessage());
        }
    }
}
