<nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center">
        <a href="/" class="text-xl font-bold text-blue-600">Vuokraamo</a>
        <div class="flex space-x-4">
            @if (tarkistaKirjautuminen())
                <a href="/asiakas" class="text-gray-600 hover:text-blue-500">Asiakkaat</a>
                <a href="/tuote" class="text-gray-600 hover:text-blue-500">Tuotteet</a>
                <a href="/logout" class="text-gray-600 hover:text-blue-500">Kirjaudu ulos</a>
            @else
                <a href="/kirjaudu" class="text-gray-600 hover:text-blue-500">Kirjaudu sisään</a>
            @endif
        </div>
    </div>
</nav>
