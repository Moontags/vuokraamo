<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RentXpresss</title>
    @vite('resources/css/app.css')
    <style>

        body {

            background-image: url('/image/jeep1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;

        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <header class="bg-black shadow-sm bg-opacity-50">
        <div class="container mx-auto px-4 py-6 flex items-center justify-between">

            <a href="{{ url('/') }}" class="text-lg font-bold text-white">
                RentXpress
            </a>

            <button id="mobile-menu-button" class="text-white md:hidden">
                <i class="bi bi-list text-2xl"></i>
            </button>

            <nav
                id="mobile-menu"
                class="hidden md:flex md:space-x-8 absolute md:relative top-full left-0 w-full bg-black md:bg-transparent md:w-auto flex-col md:flex-row md:items-center"
            >
                <a href="{{ url('/asiakas') }}" class="block text-white hover:text-blue-500 px-4 py-2 md:py-0">Asiakas</a>
                <a href="{{ url('/tuote') }}" class="block text-white hover:text-blue-500 px-4 py-2 md:py-0">Mallisto</a>
                <a href="{{ url('/myyja') }}" class="block text-white hover:text-blue-500 px-4 py-2 md:py-0">Myyjä</a>
                <a href="{{ url('/vuokraus') }}" class="block text-white hover:text-blue-500 px-4 py-2 md:py-0">Vuokraus</a>
            </nav>


            <div class="flex items-center space-x-4">

                {{-- <form action="#" method="GET" class="hidden md:block relative">
                    <input
                        type="text"
                        placeholder="Haku"
                        class="border border-gray-300 rounded px-3 py-1 focus:outline-none focus:ring focus:ring-blue-300"
                    />
                    <button
                        type="submit"
                        class="absolute right-0 top-0 mr-2 mt-2 text-blue-500 hover:text-blue-700"
                    >
                       Search
                    </button>
                </form> --}}
                @auth
                    <form action="{{ route('ulos') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:text-red-500 flex items-center">
                            <i class="bi bi-box-arrow-right text-lg"></i>
                            <span class="ml-1">Ulos</span>
                        </button>
                    </form>
                @else
                    <a href="{{ url('/kirjaudu') }}" class="text-white hover:text-blue-500 flex items-center">
                        <i class="bi bi-box-arrow-in-right text-lg"></i>
                        <span class="ml-1">Kirjaudu</span>
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <div class="flex-grow">

        <div class="container mx-auto py-8 text-center">
            <h1 class="text-5xl font-bold text-white">RentXpress</h1>
            <p class="mt-6 text-2xl text-white">Helppoa vuokrausta vaikeisiinkin olosuhteisiin vuodesta 1985</p>
            <div class="mt-12">
                <a href="{{ route('vuokraus.index') }}" class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-3 rounded shadow">
                    Vuokraa
                </a>
            </div>
        </div>
    </div>
    @include('inc.footer')
</body>
</html>
