<nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center">
        <a href="/" class="text-xl font-bold text-blue-600">Vuokraamo</a>
        <button class="block lg:hidden text-gray-600 focus:outline-none">
            <i class="bi bi-list"></i>
        </button>
        <div class="hidden lg:flex space-x-4">
            @if (tarkistaKirjautuminen())
                <a href="/asiakas" class="text-gray-600 hover:text-blue-500">Asiakkaat</a>
                <a href="/tuote" class="text-gray-600 hover:text-blue-500">Tuotteet</a>
                <a href="/myyja" class="text-gray-600 hover:text-blue-500">Myyjät</a>
                <a href="/vuokraus" class="text-gray-600 hover:text-blue-500">Vuokraus</a>
                <a href="/vuokralla" class="text-gray-600 hover:text-blue-500">Vuokralla</a>
                <form action="/search" method="GET" class="flex">
                    <input type="text" name="query" placeholder="Hae" class="border border-gray-300 rounded px-2 py-1">
                    <button type="submit" class="ml-2 bg-blue-500 text-white px-3 py-1 rounded">Hae</button>
                </form>
                <a href="{{ route('logout') }}" class="text-gray-600 hover:text-blue-500 flex items-center">
                    Ulos <i class="bi bi-box-arrow-right ml-1"></i>
                </a>

            @else
                <a href="/kirjaudu" class="text-gray-600 hover:text-blue-500 flex items-center">
                    Kirjaudu <i class="bi bi-box-arrow-in-right ml-1"></i>
                </a>
            @endif
        </div>
    </div>
</nav>
