<x-layouts.layout title="EDIT">
    <div class="flex flex-row justify-center items-center min-h-screen bg-yellow-200">

        <form action="{{route("miembros.update", $miembro->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="bg-white rounded-2xl p-5">

                <div>
                    <x-input-label for="nombre" value="Nombre"/>
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                  value="{{ $miembro->nombre}}"/>
                    @error("nombre")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div>
                    <x-input-label for="tipo_sangre" value="Tipo de Sangre"/>
                    <x-text-input id="tipo_sangre" class="block mt-1 w-full" type="text" name="tipo_sangre"
                                  value="{{ $miembro->tipo_sangre}}"/>
                    @error("tipo_sangre")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div>
                    <x-input-label for="fecha_entrada" value="Fecha de entrada"/>
                    <x-text-input id="fecha_entrada" class="block mt-1 w-full" type="date" name="fecha_entrada"
                                  value="{{ $miembro->fecha_entrada}}"/>
                    @error("fecha_entrada")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div>
                    <x-input-label for="rango" value="Rango"/>
                    <x-text-input id="rango" class="block mt-1 w-full" type="number" name="rango"
                                  value="{{ $miembro->rango}}"/>
                    @error("rango")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="p-2">
                    <button class= "btn btn-sm btn-success"  type="submit">Guardar </button>
                    <a class= "btn btn-sm btn-success" href="{{route("miembros.index")}}">Cancelar</a>
                </div>

            </div>
        </form>

    </div>
</x-layouts.layout>
