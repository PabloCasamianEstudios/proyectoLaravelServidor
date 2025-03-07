<x-layouts.layout title="HOME">
    <!-- Sección para usuarios no autenticados -->
    @guest
        <div
            class="hero min-h-screen"
            style="background-image: url('{{ asset('images/ocultism.jpg') }}');">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-neutral-content text-center">
                <div class="max-w-md">
                    <h1 class="mb-5 text-5xl font-bold">{{ __('¡Bienvenido!') }}</h1>
                    <p class="mb-5">
                        {{ __('Al club secreto secretoso, más secreto y secretoso de todos los clubs secretos y secretosos.') }}
                    </p>
                    <a class="btn btn-warning hover:scale-110 transition-transform duration-300" href="{{ route('about') }}">
                        {{ __('Más sobre nosotros') }}
                    </a>
                </div>
            </div>
        </div>
    @endguest

    <!-- Sección para usuarios autenticados -->
    @auth
        <div class="flex items-center flex-col justify-center min-h-screen">
            <h1 class="text-3xl font-bold">{{ __('Administrar Miembros del Club') }}</h1>
            <div class="animacionScaleHover p-4 card bg-base-100 image-full w-96 shadow-xl hover:scale-105 transition-all duration-300">
                <figure>
                    <img src="{{ asset('/images/eye.png') }}" alt="{{ __('Administrar Miembros del club') }}" class="rounded-xl"/>
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ __('CRUD Miembros!') }}</h2>
                    <p>{{ __('Gestión del club') }}</p>
                    <div class="card-actions justify-end">
                        <a class="btn btn-warning hover:bg-yellow-600 transition-colors duration-300" href="{{ route('miembros.index') }}">
                            {{ __('Ver miembros') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</x-layouts.layout>
