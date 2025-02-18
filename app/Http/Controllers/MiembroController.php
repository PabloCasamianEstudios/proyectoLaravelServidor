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
    /*//para que la sangre sea un tipo válido
    $request->validate([
        'tipo_sangre' => ['required', 'regex:/^(A|B|AB|O)(\+|\-)$/'],
    ]);*/

    $datos = $request->input();

    if (!isset($datos['fecha_entrada'])) {
        $datos['fecha_entrada'] = now()->toDateString();
    }

    $miembro = new Miembro($datos);
    $miembro->save();
    session()->flash('mensaje', "$miembro->nombre es ahora miembro del culto" );

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
        return view('miembros.edit', compact('miembro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemiembroRequest $request, miembro $miembro)
    {
        $miembro->update($request->input());
        session()->flash("mensaje","El miembro $miembro->nombre ha sido modificado");
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
