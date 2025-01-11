<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vuokraamo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <header class="bg-black shadow-sm opacity-50">
        <div class="container  mx-auto px-4 py-6 flex justify-between items-center">
            <!-- Logo tai Sivun Nimi -->
            <a href="{{ url('/') }}" class="text-lg font-bold text-white">
                Eezy Renting
            </a>

            <!-- Navigointi -->
            <nav class="flex space-x-8">
                <a href="{{ url('/asiakas') }}" class="text-white hover:text-blue-500">Asiakas</a>
                <a href="{{ url('/tuote') }}" class="text-white hover:text-blue-500">Automme</a>
                <a href="{{ url('/myyja') }}" class="text-white hover:text-blue-500">Myyjä</a>
                <a href="{{ url('/vuokraus') }}" class="text-white hover:text-blue-500">Vuokraus</a>
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
                        Etsi
                    </button>
                </form>

                <!-- Tarkista kirjautumistila -->
                @auth
                    <!-- Jos käyttäjä on kirjautunut -->
                    <form action="{{ route('ulos') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:text-red-500 flex items-center">
                            <i class="bi bi-box-arrow-right text-lg"></i>
                            <span class="ml-1">Ulos</span>
                        </button>
                    </form>
                @else
                    <!-- Jos käyttäjä ei ole kirjautunut -->
                    <a href="{{ url('/kirjaudu') }}" class="text-white hover:text-blue-500 flex items-center">
                        <i class="bi bi-box-arrow-in-right text-lg"></i>
                        <span class="ml-1">Kirjaudu</span>
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <script>
        setTimeout(() => {
            const successMessage = document.querySelector('.bg-green-100');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 3000); // 3 sekuntia
    </script>
</body>
</html>
