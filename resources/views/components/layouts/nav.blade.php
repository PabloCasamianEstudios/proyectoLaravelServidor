<div class="navbar bg-gradient-to-r from-yellow-500 via-yellow-400 to-yellow-300 p-4 shadow-lg rounded-b-xl flex items-center justify-around space-x-8">
    <a class="text-xl text-gray-800 font-semibold hover:text-white transition duration-300 ease-in-out transform hover:scale-105" href="{{ route('home') }}">
        {{ __("inicio") }}
    </a>
    <a class="text-xl text-gray-800 font-semibold hover:text-white transition duration-300 ease-in-out transform hover:scale-105" href="{{ route('about') }}">
        {{ __("sobre") }}
    </a>
    <a class="text-xl text-gray-800 font-semibold hover:text-white transition duration-300 ease-in-out transform hover:scale-105" href="{{ route('news') }}">
        {{ __("novedades") }}
    </a>
    <a class="text-xl text-gray-800 font-semibold hover:text-white transition duration-300 ease-in-out transform hover:scale-105" href="{{ route('contact') }}">
        {{ __("contact") }}
    </a>
</div>
