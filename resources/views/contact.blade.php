<x-layouts.layout title="CONTACTO">
    <div class="flex justify-center items-center min-h-screen bg-yellow-200 p-6">
        <div class="bg-white rounded-2xl p-6 shadow-lg w-full max-w-5xl">
            <h2 class="text-2xl font-semibold text-black mb-6">Formulario de Contacto</h2>

            <!-- Mensaje -->
            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-4 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-200 text-red-800 p-4 rounded-lg mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Formulario -->
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-black">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg text-black" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-black">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg text-black" required>
                </div>

                <div class="mb-4">
                    <label for="mensaje" class="block text-black">Mensaje</label>
                    <textarea name="mensaje" id="mensaje" rows="4" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg text-black" required></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
