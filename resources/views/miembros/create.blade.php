<x-layouts.layout>
    <div class="flex flex-row justify-center items-center min-h-screen bg-yellow-200">
        <div class="bg-white rounded-2xl p-5">
            <form action="{{route('miembros.store')}}" method="post">
                @csrf

                <div>
                    <x-input-label for="nombre" value="Nombre" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{old('nombre')}}" required autofocus autocomplete="username" />

                    @error('nombre')
                        <div class="text-sm text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <x-input-label for="tipo_sangre" value="Tipo de Sangre" />
                    <x-text-input id="tipo_sangre" class="block mt-1 w-full" type="text" name="tipo_sangre" value="{{ old('tipo_sangre') }}" required autofocus autocomplete="tipo_sangre" />

                    @error('tipo_sangre')
                    <div class="text-sm text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <x-input-label for="fecha_entrada" value="Decha de entrada" />
                    <x-text-input id="fecha_entrada" class="block mt-1 w-full" type="date" name="fecha_entrada" value="{{ old('fecha_entrada') }}" required autofocus autocomplete="Fecha de Entrada" />

                    @error('fecha_entrada')
                        <div class="text-sm text-red-600">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div>
                    <x-input-label for="rango" value="Rango (del 1 al 5)" />
                    <x-text-input id="rango" class="block mt-1 w-full" type="text" name="rango" value="{{ old('rango') }}" required autofocus autocomplete="rango" />

                    @error('rango')
                        <div class="text-sm text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex flex-row justify-between p-3">
                    <button class="btn btn-warning" type="submit">Guardar</button>
                    <a class="btn btn-warning" href="{{ route('miembros.index') }}">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</x-layouts.layout>
