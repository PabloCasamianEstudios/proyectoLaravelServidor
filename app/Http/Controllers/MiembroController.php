<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoremiembroRequest;
use App\Http\Requests\UpdatemiembroRequest;
use App\Models\miembro;
use App\Policies\MiembroPolicy;
use Illuminate\Support\Facades\Schema;

class MiembroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
   {
       $campos = Schema::getColumnListing('miembros');
       $exclude=['created_at','updated_at'];
       $campos = array_diff($campos, $exclude);
       $filas = Miembro::select($campos)->get();
       return view('miembros.index', compact('filas','campos'));
   }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('miembros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMiembroRequest $request)
{
    $datos = $request->validated(); // Usar datos validados
    $miembro = new Miembro($datos);
    $miembro->save();

    // Eliminar eventos anteriores asociados al miembro
    $miembro->eventos()->delete();

    // Verificar si se ha enviado la lista de eventos
    if ($request->has('eventos')) {
        $eventos = collect($request->input('eventos'));

        // Iterar sobre los eventos y crear los registros correspondientes
        $eventos->each(function ($evento) use ($miembro, $request) {
            $miembro->eventos()->create([
                'evento' => $evento, // Nombre del evento
                'tipo' => $request->input('tipo')[$evento] ?? null, // Tipo del evento
                'nivel' => $request->input('nivel')[$evento] ?? null, // Nivel del evento
            ]);
        });
    }

    // Mensaje de éxito
    session()->flash('mensaje', "$miembro->nombre es ahora miembro del culto");

    // Redirigir a la lista de miembros
    return redirect()->route('miembros.index');
}



    /**
     * Display the specified resource.
     */
    public function show(miembro $miembro)
    {
        return view('miembros.show', compact('miembro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(miembro $miembro)
    {
        return view('miembros.edit', compact('miembro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMiembroRequest $request, Miembro $miembro)
{

    if ($request->has('eventos')) {
        $eventosSolicitud = collect($request->input('eventos'));
     
        // Añadir o actualizar
        $eventosSolicitud->each(function ($evento) use ($miembro, $request) {
            $miembro->eventos()->updateOrCreate(
                ['evento' => $evento],
                [
                    'tipo' => $request->input('tipo')[$evento] ?? null,
                    'nivel' => $request->input('nivel')[$evento] ?? null, 
                ]
            );
        });
    } else {
        $miembro->eventos()->delete();
    }

    session()->flash('mensaje', "El miembro $miembro->nombre ha sido modificado");

    return redirect()->route('miembros.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(miembro $miembro)
    {
        $miembro->delete();
        session()->flash("mensaje", "El miembro $miembro->nombre ha sido eliminado");
        return redirect()->route('miembros.index');
    }
}
