<x-layouts.layout>
    <div class="flex flex-row justify-center items-center min-h-screen bg-yellow-200 p-6">
        <div class="bg-white rounded-2xl p-6 shadow-lg w-full max-w-5xl">
            <form action="{{ route('miembros.store') }}" method="post" class="grid grid-cols-2 gap-6">
                @csrf
                
                <!-- Datos del Miembro -->
                <div class="bg-gray-100 p-6 rounded-xl">
                    <h2 class="text-lg font-bold mb-4 text-gray-700">Datos del Miembro</h2>
                    
                    <div class="mb-4">
                        <x-input-label for="nombre" value="Nombre" class="text-gray-700" />
                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ old('nombre') }}" required autofocus autocomplete="username" />
                        @error('nombre')<div class="text-sm text-red-600">{{ $message }}</div>@enderror
                    </div>
                    
                    <div class="mb-4">
                        <x-input-label for="tipo_sangre" value="Tipo de Sangre" class="text-gray-700" />
                        <x-text-input id="tipo_sangre" class="block mt-1 w-full" type="text" name="tipo_sangre" value="{{ old('tipo_sangre') }}" required autocomplete="tipo_sangre" />
                        @error('tipo_sangre')<div class="text-sm text-red-600">{{ $message }}</div>@enderror
                    </div>
                    
                    <div class="mb-4">
                        <x-input-label for="fecha_entrada" value="Fecha de Entrada" class="text-gray-700" />
                        <x-text-input id="fecha_entrada" class="block mt-1 w-full" type="date" name="fecha_entrada" value="{{ old('fecha_entrada') }}" required autocomplete="Fecha de Entrada" />
                        @error('fecha_entrada')<div class="text-sm text-red-600">{{ $message }}</div>@enderror
                    </div>
                    
                    <div class="mb-4">
                        <x-input-label for="rango" value="Rango (del 1 al 5)" class="text-gray-700" />
                        <x-text-input id="rango" class="block mt-1 w-full" type="number" name="rango" value="{{ old('rango') }}" required autocomplete="rango" />
                        @error('rango')<div class="text-sm text-red-600">{{ $message }}</div>@enderror
                    </div>
                    
                    <div class="flex justify-between mt-4">
                        <button class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg" type="submit">Guardar</button>
                        <a class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded-lg" href="{{ route('miembros.index') }}">Cancelar</a>
                    </div>
                </div>
                
                <!-- Eventos -->
                <div class="bg-gray-100 p-6 rounded-xl">
                    <h2 class="text-lg font-bold mb-4 text-gray-700">Eventos</h2>
                    <div class="overflow-x-auto max-h-80 border border-gray-300 rounded-lg p-2">
                        <table class="table-auto w-full text-sm text-gray-700">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-2 px-3 text-left">Evento</th>
                                    <th class="py-2 px-3 text-left">Tipo</th>
                                    <th class="py-2 px-3 text-left">Nivel</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(config("eventos") as $evento)
                                    <tr class="border-b">
                                        <td class="py-2 px-3 flex items-center">
                                            <input type="checkbox" value="{{$evento}}" name="eventos[]" class="mr-2">{{$evento}}
                                        </td>
                                        <td class="py-2 px-3">
                                            <select class="text-sm h-8 rounded-md border-gray-300" name="tipo[{{$evento}}]">
                                                <option value="mundano">Mundano</option>
                                                <option value="extremo">Extremo</option>
                                                <option value="religioso">Religioso</option>
                                                <option value="demoniaco">Demoniaco</option>
                                                <option value="???">???</option>
                                            </select>
                                        </td>
                                        <td class="py-2 px-3">
                                            <select class="text-sm h-8 rounded-md border-gray-300" name="nivel[{{$evento}}]">
                                                @for ($i = 0; $i <= 10; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
