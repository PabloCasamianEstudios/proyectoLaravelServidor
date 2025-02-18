<header class="header md:h-15v bg-header
flex flex-row md:flex-row justify-around items-center p-3">

    <img class="w-20 max-h-full p-1 md:max-h-full" src="{{asset ("images/logo.png")}}" alt="logo">
    <h1 class="hidden md:block text-white-900 text-7xl">{{__("CLUB SECRETO")}}</h1>
    {{--Header pc--}}
    <div class="hidden md:flex flex-row space-x-3">
        @auth
            {{auth()->user()->name}}
            <form action="{{route("logout")}}" method="post">
                @csrf
                <button type="submit" class="btn btn-error">{{__("logout")}}</button>
            </form>
        @endauth
        @guest
            <div class="flex flex-row gap-5">
                <a class="btn btn-glass" href="login">Login</a>
                <a class="btn btn-glass" href="register">Register</a>
            </div>



        @endguest
            <x-layouts.lang />
    </div>

    {{--Header movil--}}
    <div class="block md:hidden">
        <input type="checkbox" name="" id="menu-toggle" class=" peer hidden">

        <label  class="hover:scale-110 transition-transform duration-300 text-5xl hover:cursor-pointer text-white " for="menu-toggle">
            &#9778;
        </label>


        <div class=" fixed right-0 hidden peer-checked:block bg-gray-300 p-3 rounded-xl flex flex-col">
        @auth
            {{auth()->user()->name}}
            <form action="{{route("logout")}}" method="post">
                @csrf
                <button type="submit" class="btn btn-error">Logout</button>
            </form>
        @endauth
        @guest
            <div class="flex flex-row gap-5">
                <a class="btn btn-glass" href="login">{{__("Login")}}</a>
                <a class="btn btn-glass" href="register">{{__("Register")}}</a>
            </div>
        @endguest
        </div>
    </div>

</header>
