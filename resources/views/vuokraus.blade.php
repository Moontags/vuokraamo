<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lisää Vuokraus</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-white  flex flex-col min-h-screen">
    @include('inc.header')
    <div class="container max-w-4xl mx-auto py-8 mt-8 flex-grow">
        <h1 class="text-3xl font-bold mb-6">Lisää Vuokraus</h1>

        <!-- Onnistumisviesti -->
        @if (session('success'))
        <div id="successMessage" class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                const successMessage = document.getElementById('successMessage');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
            }, 2000); // 2 sekuntia
        </script>
    @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vuokraus.tallenna') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="asiakasID" class="block text-gray-700 font-bold mb-2">Asiakas:</label>
                <select name="asiakasID" id="asiakasID" class="w-full border border-gray-300 px-4 py-2 rounded">
                    @foreach ($asiakkaat as $asiakas)
                        <option value="{{ $asiakas->id }}">{{ $asiakas->nimi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="vuokrauspvm" class="block text-gray-700 font-bold mb-2">Vuokrauspäivämäärä:</label>
                <input type="date" name="vuokrauspvm" id="vuokrauspvm" value="{{ date('Y-m-d') }}" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>

            <div class="mb-4">
                <label for="palautuspvm" class="block text-gray-700 font-bold mb-2">Palautuspäivämäärä:</label>
                <input type="date" name="palautuspvm" id="palautuspvm" class="w-full border border-gray-300 px-4 py-2 rounded">
            </div>

            <h2 class="text-2xl font-bold mb-4">Vuokrattavat tuotteet</h2>
            <div id="tuotteet">
                <div class="tuoterivi flex items-center mb-4 space-x-4">
                    <select name="tuote[]" class="border border-gray-300 px-4 py-2 rounded flex-grow">
                        @foreach ($tuotteet as $tuote)
                            <option value="{{ $tuote->id }}">{{ $tuote->nimi }}</option>
                        @endforeach
                    </select>
                    <input type="datetime-local" name="alkamisaika[]" class="border border-gray-300 px-4 py-2 rounded flex-grow">
                    <input type="datetime-local" name="paattymisaika[]" class="border border-gray-300 px-4 py-2 rounded flex-grow">
                    <input type="text" name="hinta[]" placeholder="Hinta" class="border border-gray-300 px-4 py-2 rounded flex-grow">
                    <button type="button" class="text-red-500 removeRivi">Poista</button>
                </div>
            </div>

            <button type="button" id="lisaaRivi" class="bg-blue-500 text-white px-4 py-2 rounded">Lisää rivi</button>

            <div class="mt-6">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Tallenna Vuokraus</button>
            </div>
        </form>
    </div>

    <script>
        document.querySelector("#lisaaRivi").addEventListener("click", function() {
            const tuotteet = document.querySelector("#tuotteet");
            const rivi = tuotteet.firstElementChild.cloneNode(true);
            tuotteet.appendChild(rivi);

            const removeButtons = document.querySelectorAll(".removeRivi");
            removeButtons.forEach((button) => {
                button.addEventListener("click", function() {
                    if (removeButtons.length > 1) {
                        button.parentElement.remove();
                    }
                });
            });
        });
    </script>
     @include('inc.footer')
</body>
</html>
