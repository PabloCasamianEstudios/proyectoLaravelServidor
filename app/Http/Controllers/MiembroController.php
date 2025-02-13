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
    public function store(StoremiembroRequest $request)
{
    $datos = $request->input();

    // 🔥 SOLUCIÓN: Aseguramos que 'fecha_entrada' se guarde correctamente
    if (!isset($datos['fecha_entrada'])) {
        $datos['fecha_entrada'] = now()->toDateString(); // Fecha actual si no está presente
    }

    $miembro = new Miembro($datos);
    $miembro->save();

    return redirect()->route('miembros.index');
}


    /**
     * Display the specified resource.
     */
    public function show(miembro $miembro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(miembro $miembro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemiembroRequest $request, miembro $miembro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(miembro $miembro)
    {
        //
    }
}
