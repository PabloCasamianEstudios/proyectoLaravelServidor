<x-layouts.layout>
    <!-- Mensaje de éxito -->
    @if (session("
    "))
        <div role="alert" class="alert alert-success bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" id="mensaje">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current mr-3" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session("mensaje") }}</span>
        </div>
    @endif

    <div class="p-4 flex flex-row justify-start items-center space-x-4">
        <a href="{{ route('miembros.create') }}" class="btn btn-sm btn-warning px-6 py-2 rounded-md shadow-md hover:bg-yellow-500 hover:text-white transition-colors duration-300">Crear miembro</a>
        <a href="{{ route('home') }}" class="btn btn-sm btn-warning px-6 py-2 rounded-md shadow-md hover:bg-yellow-500 hover:text-white transition-colors duration-300">Volver</a>
    </div>

    <!-- Tabla de miembros -->
    <div class="max-h-full overflow-x-auto p-2">
        <table class="table table-xs table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    @foreach($campos as $campo)
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">{{ $campo }}</th>
                    @endforeach
                    <th class="px-4 py-2"></th>
                    <th class="px-4 py-2"></th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($filas as $fila)
                    <tr class="hover:bg-yellow-200 transition-all">
                        @foreach($campos as $campo)
                            <td class="px-4 py-2 text-sm">{{ $fila->$campo }}</td>
                        @endforeach
                        <!-- Editar -->
                        <td class="px-4 py-2 text-center">
                            <a href="{{route("miembros.edit", $fila->id)}}" class="text-blue-600 hover:text-blue-800 transition-colors duration-300" aria-label="Editar miembro">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>
                        </td>
                        <!-- Eliminar -->
                        <td class="px-4 py-2 text-center">
                            <form onsubmit="event.preventDefault()" id="formulario{{ $fila->id }}" action="{{ route('miembros.destroy', $fila->id) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <button onclick="confirmDelete({{ $fila->id }})" class="text-red-600 hover:bg-red-400 hover:text-white px-3 py-1 rounded-full transition-all duration-200" aria-label="Eliminar miembro">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                    </svg>
                                </button>
                            </form>
                        </td>

                        <td> <a href="{{route("miembros.show", $fila->id)}}">Ver</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Script para confirmar eliminación -->
    <script>
        function confirmDelete (id) {
            swal({
                title: "¿Confirmar borrado?",
                text: "Esta acción no se puede deshacer",
                icon: "warning",
                buttons: true
            }).then(function (ok) {
                if (ok) {
                    let formulario = document.getElementById("formulario" + id);
                    formulario.submit();
                }
            });
        }

        setTimeout(() => {
            var message = document.getElementById("mensaje");
            if (message) {
                message.style.transition = "opacity 0.5s";
                message.style.opacity = "0";
                setTimeout(() => message.remove(), 500);
            }
        }, 5000);
    </script>
</x-layouts.layout>
