<x-layouts.layout>
    <div class="flex flex-col justify-center items-center min-h-screen bg-yellow-200 p-6">
        <div class="bg-white rounded-2xl p-6 shadow-lg w-full max-w-5xl">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Detalles del Miembro: {{$miembro->id}}</h1>
            
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Eventos a los que está asignado:</h2>
            
            @if($miembro->eventos->isEmpty())
                <p class="text-center text-gray-600">Este miembro no está asignado a ningún evento.</p>
            @else
                <div class="overflow-x-auto max-h-80 border border-gray-300 rounded-lg p-4">
                    <table class="table-auto w-full text-sm text-gray-700">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 text-left font-semibold text-gray-900">Evento</th>
                                <th class="py-2 px-4 text-left font-semibold text-gray-900">Tipo</th>
                                <th class="py-2 px-4 text-left font-semibold text-gray-900">Nivel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($miembro->eventos as $evento)
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="py-2 px-4 text-gray-800">{{$evento->evento}}</td>
                                    <td class="py-2 px-4 text-gray-800 capitalize">{{$evento->tipo}}</td>
                                    <td class="py-2 px-4 text-gray-800">{{$evento->nivel}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="flex justify-end mt-6">
                <a class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg" href="{{ route('miembros.index') }}">Volver</a>
            </div>
        </div>
    </div>
</x-layouts.layout>
