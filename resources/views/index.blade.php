<x-layouts.layout title="HOME">
    @guest
        <div
            class="hero min-h-screen"
            style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-neutral-content text-center">
                <div class="max-w-md">
                    <h1 class="mb-5 text-5xl font-bold">¡Bienvenido!</h1>
                    <p class="mb-5">
                        Al club secreto secretoso, más secreto y secretoso
                        de todos los clubs secretos y secretosos.
                    </p>
                    <button class="btn btn-primary">Get Started</button>
                </div>
            </div>
        </div>
    @endguest

    @auth
            <div
                class="hero min-h-screen"
                style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">
                <div class="hero-overlay bg-opacity-60"></div>
                <div class="hero-content text-neutral-content text-center">
                    <div class="max-w-md">
                        <h1 class="mb-5 text-5xl font-bold">Bienvenido!</h1>
                        <p class="mb-5">
                            Al club secreto secretoso, el más secreto y secretoso
                            de todos los clubs secretos y secretosos.
                        </p>
                        <button class="btn btn-primary">Get Started</button>
                        <a href="{{route("")}}"BOTON</a>
                    </div>
                </div>
            </div>
    @endauth
</x-layouts.layout>
