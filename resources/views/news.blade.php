<x-layouts.layout title="NEWS">
{{--SI SOBRA TIEMPO, ME GUSTARÍA CREAR UN MODEL DE NEW, QUE TENGA TITULO Y CONTENIDO O ALGO ASÍ --}}
        <div class="bg-gray-200 min-h-screen flex justify-center items-center p-10">
            <div class="bg-white shadow-lg rounded-2xl p-8 max-w-3xl w-full">
                <h1 class="text-3xl font-bold text-center text-indigo-700 mb-6">{{ __('Últimas Noticias del Club Secreto Secretoso') }}</h1>

                <div class="text-lg text-gray-700">
                    <p class="mb-4">
                        {{ __('Bienvenidos a la sección de noticias de nuestro exclusivo y secreto club. Aquí, solo los miembros más intrépidos tienen acceso a los eventos más recientes y los anuncios que mantienen vivo el misterio.') }}
                    </p>

                    <div class="space-y-4">
                        <!-- Noticia 1 -->
                        <div class="bg-indigo-50 p-4 rounded-lg shadow-md">
                            <h2 class="text-xl font-semibold text-indigo-700 mb-2">{{ __('La Reunión Secreta de la Luna Llena') }}</h2>
                            <p class="text-gray-600 mb-2">
                                {{ __('Este mes, durante la luna llena, el Club Secreto Secretoso llevará a cabo su reunión anual. Los miembros deberán seguir instrucciones estrictas para llegar al lugar secreto.') }}
                            </p>
                            <p class="text-sm text-gray-500">{{ __('Publicado el:') }} 18 Feb 2025</p>
                            <div class="mt-2 text-center">
                                <a href="#" class="text-indigo-600 font-semibold hover:underline">{{ __('Leer más...') }}</a>
                            </div>
                        </div>

                        <!-- Noticia 2 -->
                        <div class="bg-indigo-50 p-4 rounded-lg shadow-md">
                            <h2 class="text-xl font-semibold text-indigo-700 mb-2">{{ __('El Misterioso Código del Club') }}</h2>
                            <p class="text-gray-600 mb-2">
                                {{ __('Un nuevo código secreto ha sido descubierto dentro de los archivos más profundos del Club Secreto Secretoso. Este código contiene información vital sobre el futuro de la organización.') }}
                            </p>
                            <p class="text-sm text-gray-500">{{ __('Publicado el:') }} 12 Feb 2025</p>
                            <div class="mt-2 text-center">
                                <a href="#" class="text-indigo-600 font-semibold hover:underline">{{ __('Leer más...') }}</a>
                            </div>
                        </div>

                        <!-- Noticia 3 -->
                        <div class="bg-indigo-50 p-4 rounded-lg shadow-md">
                            <h2 class="text-xl font-semibold text-indigo-700 mb-2">{{ __('Los Nuevos Miembros del Club Secreto') }}</h2>
                            <p class="text-gray-600 mb-2">
                                {{ __('Hemos recibido una nueva tanda de solicitudes de miembros. Las entrevistas se llevarán a cabo en la sede secreta, con medidas de seguridad extremas.') }}
                            </p>
                            <p class="text-sm text-gray-500">{{ __('Publicado el:') }} 10 Feb 2025</p>
                            <div class="mt-2 text-center">
                                <a href="#" class="text-indigo-600 font-semibold hover:underline">{{ __('Leer más...') }}</a>
                            </div>
                        </div>

                        <!-- Noticia 4 -->
                        <div class="bg-indigo-50 p-4 rounded-lg shadow-md">
                            <h2 class="text-xl font-semibold text-indigo-700 mb-2">{{ __('Un Secreto Mejor Guardado') }}</h2>
                            <p class="text-gray-600 mb-2">
                                {{ __('Los miembros más avanzados del Club han descubierto un secreto que cambia el rumbo de toda la organización. Los detalles aún son confidenciales, pero pronto se revelarán.') }}
                            </p>
                            <p class="text-sm text-gray-500">{{ __('Publicado el:') }} 5 Feb 2025</p>
                            <div class="mt-2 text-center">
                                <a href="#" class="text-indigo-600 font-semibold hover:underline">{{ __('Leer más...') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <p class="text-gray-700">
                            {{ __('Mantente atento. Las noticias secretas llegan solo a los más preparados.') }}
                        </p>
                        <a href="{{ route('miembros.create') }}" class="text-indigo-600 font-semibold text-lg hover:underline">{{ __('Unirte al Club Secreto Secretoso') }}</a>
                    </div>
                </div>
            </div>
        </div>
</x-layouts.layout>
