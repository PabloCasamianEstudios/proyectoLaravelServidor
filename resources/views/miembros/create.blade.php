<x-layouts.layout>

    <div class="flex flex-row justify-center items-center min-h-screen bg-yellow-200">
        <div class="bg-white rounded-2xl p-5">
        <form action=" {{route('miembros.store')}}" method="post">

            @csrf
            

                <div>
                    <x-input-label for="nombre" value="{{__('Nombre')}}" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" required autofocus autocomplete="username" />
                </div>

                <div>
                    <x-input-label for="cod" value="{{__('cod')}}" />
                    <x-text-input id="cod" class="block mt-1 w-full" type="text" name="cod" required autofocus autocomplete="codigo" />
                </div>

                <div>
                    <x-input-label for="fecha_entrada" value="{{__('fecha_entrada')}}" />
                    <x-text-input id="fecha_entrada" class="block mt-1 w-full" type="date" name="fecha_entrada" required autofocus autocomplete="Fecha de Entrada" />
                </div>

                <div>
                    <x-input-label for="rango" value="{{__('Rango')}}" />
                    <x-text-input id="rango" class="block mt-1 w-full" type="text" name="rango" required autofocus autocomplete="rango" />
                </div>

                <div class="flex flex-row justify-between p-3">
                    <button class="btn btn-warning" type="submit">Guardar</button>
                    <a class="btn btn-warning" type="submit" href={{route('miembros.index')}}>Cancelar</a>
                </div>

           
        </form>
    </div>
    </div>
</x-layouts.layout>
