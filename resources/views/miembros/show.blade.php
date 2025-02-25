<x-layouts.layout>
    <h1>Miembro : {{$miembro->id}}</h1>
    <h2>Eventos a los que está asignado:</h2>
    @foreach($miembro->eventos as $evento)
        <h2 class="space-x-2">
        <span> {{$evento->evento}}</span>
        <span> {{$evento->tipo}}</span>
        <span> {{$evento->nivel}}</span>
        </h2>
    @endforeach
</x-layouts.layout>