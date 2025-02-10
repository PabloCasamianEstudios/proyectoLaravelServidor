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
            <div class="flex items-center flex-col justify-center min-h-screen">

                <h1 class=" text-3xl font-bold ">Administrar Miembros del Club</h1>
                <div class="animacionScaleHover p-4 card bg-base-100 image-full w-96 shadow-xl">
                    <figure>
                        <img
                            src="{{asset("/images/eye.png")}}"
                            alt="Administrar Miembros del club" />
                    </figure>
                    <div class="card-body">
                        <img
                            src="{{asset("/images/eye.png")}}"/>

                        <h2 class="card-title">CRUD Miembros!</h2>
                        <p> Gestión del club
                        <div class="card-actions justify-end">
                            <a class="btn btn-warning" href="{{route("miembros.index")}}">Ver miembros</a>
                        </div>
                    </div>
                </div>
            </div>
    @endauth
</x-layouts.layout>
