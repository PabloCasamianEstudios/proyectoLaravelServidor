<x-layouts.layout title="REGISTER">
    <div class="flex flex-row justify-center items-center min-h-screen bg-gradient-to-r from-yellow-400 to-yellow-500">
        <!-- Contenedor de registro -->
        <div class="bg-white rounded-3xl p-8 shadow-xl w-full max-w-sm">

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nombre -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full rounded-lg border-gray-300 shadow-md focus:ring-yellow-500 focus:border-yellow-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Dirección de correo electrónico -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full rounded-lg border-gray-300 shadow-md focus:ring-yellow-500 focus:border-yellow-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Contraseña -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full rounded-lg border-gray-300 shadow-md focus:ring-yellow-500 focus:border-yellow-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirmación de Contraseña -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-lg border-gray-300 shadow-md focus:ring-yellow-500 focus:border-yellow-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Botones -->
                <div class="flex items-center justify-between mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-yellow-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4 py-2 px-6 bg-yellow-500 text-white rounded-lg shadow-md hover:bg-yellow-400 focus:ring-2 focus:ring-yellow-600">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>
</x-layouts.layout>
