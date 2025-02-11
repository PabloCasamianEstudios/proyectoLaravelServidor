<header class="header md:h-10v bg-header flex flex-row md:flex-row   justify-around items-center p-3">

    <img class="w-20 max-h-full p-1" src="{{asset ("images/logo.png")}}" alt="logo">
    <h1 class="text-white-900 text-7xl">CLUB SECRETO</h1>
    <div>
        @auth
            {{auth()->user()->name}}
            <form action="{{route("logout")}}" method="post">
                @csrf
                <button type="submit" class="btn btn-error">Logout</button>
            </form>
        @endauth
        @guest
            <div class="flex flex-row gap-5">
                <a class="btn btn-glass" href="login">Login</a>
                <a class="btn btn-glass" href="register">Register</a>
            </div>



        @endguest
    </div>
</header>
