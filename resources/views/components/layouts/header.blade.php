<header class="header md:h-15v bg-gray-900 flex flex-row md:flex-row justify-between items-center p-4 shadow-lg">

    <img class="w-20 max-h-full p-1 md:max-h-full" src="{{ asset('images/logo.png') }}" alt="logo">

    <h1 class="hidden md:block text-gray-100 text-6xl font-bold tracking-wide">{{ __("CLUB SECRETO") }}</h1>

    <!-- Header en PC -->
    <div class="hidden md:flex flex-row items-center space-x-6">

        @auth
        <div class="flex flex-row items-center justify-between bg-gray-800 p-4 rounded-xl shadow-md w-64">
            <div class="text-lg font-semibold text-gray-100">
                {{ auth()->user()->name }}
            </div>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="bg-yellow-500 text-gray-900 px-4 py-2 rounded-lg hover:bg-yellow-600 transition font-medium shadow">
                    Logout
                </button>
            </form>
        </div>
        @endauth

        @guest
        <div class="flex flex-row gap-5">
            <a class="btn btn-glass bg-gray-800 text-gray-100 px-4 py-2 rounded-lg hover:bg-gray-700 transition" href="login">
                Login
            </a>
            <a class="btn btn-glass bg-yellow-500 text-gray-900 px-4 py-2 rounded-lg hover:bg-yellow-600 transition" href="register">
                Register
            </a>
        </div>
        @endguest

        <x-layouts.lang />
    </div>

    <!-- Header en Móvil -->
    <div class="block md:hidden z-10">
        <input type="checkbox" id="menu-toggle" class="peer hidden">

        <label class="hover:scale-110 transition-transform duration-300 text-5xl hover:cursor-pointer text-gray-100" for="menu-toggle">
            &#9778;
        </label>

        <div class="fixed right-0 hidden peer-checked:block bg-gray-800 p-4 rounded-xl shadow-lg flex flex-col space-y-4">
            @auth
            <div class="flex flex-row items-center justify-between bg-gray-700 p-4 rounded-lg shadow-md w-64">
                <div class="text-lg font-semibold text-gray-100">
                    {{ auth()->user()->name }}
                </div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="bg-yellow-500 text-gray-900 px-4 py-2 rounded-lg hover:bg-yellow-600 transition font-medium">
                        Logout
                    </button>
                </form>
            </div>
            @endauth

            @guest
            <div class="flex flex-row gap-5">
                <a class="btn btn-glass bg-gray-700 text-gray-100 px-4 py-2 rounded-lg hover:bg-gray-600 transition" href="login">
                    {{ __("Login") }}
                </a>
                <a class="btn btn-glass bg-yellow-500 text-gray-900 px-4 py-2 rounded-lg hover:bg-yellow-600 transition" href="register">
                    {{ __("Register") }}
                </a>
            </div>
            @endguest

            <div class="flex flex-row btn-glass rounded-xl text-gray-100">
                <x-layouts.lang />
            </div>
        </div>
    </div>

</header>
