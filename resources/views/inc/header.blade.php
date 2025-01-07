<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vuokraamo</title>

</head>
<body>
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo tai Sivun Nimi -->
            <a href="{{ url('/') }}" class="text-lg font-bold text-gray-700">
                Vuokraamo
            </a>

            <!-- Navigointi -->
            <nav class="flex space-x-4">
                <a href="{{ url('/asiakas') }}" class="text-gray-700 hover:text-blue-500">Asiakas</a>
                <a href="{{ url('/tuote') }}" class="text-gray-700 hover:text-blue-500">Tuote</a>
                <a href="{{ url('/myyja') }}" class="text-gray-700 hover:text-blue-500">Myyjä</a>
                <a href="{{ url('/vuokraus') }}" class="text-gray-700 hover:text-blue-500">Vuokraus</a>
            </nav>

            <!-- Haku ja Kirjautuminen -->
            <div class="flex items-center space-x-4">
                <form action="#" method="GET" class="relative">
                    <input
                        type="text"
                        placeholder="Haku"
                        class="border border-gray-300 rounded px-3 py-1 focus:outline-none focus:ring focus:ring-blue-300"
                    />
                    <button
                        type="submit"
                        class="absolute right-0 top-0 mr-2 mt-2 text-blue-500 hover:text-blue-700"
                    >
                        Hae
                    </button>
                </form>
                <a href="{{ url('/login') }}" class="text-gray-700 hover:text-blue-500">Kirjaudu</a>
            </div>
        </div>
    </header>

</body>
</html>
