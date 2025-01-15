<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eezy Renting</title>
    @vite('resources/css/app.css')
    <style>
        /* Taustakuvan asetukset */
        body {

            background-image: url('/image/jeep1.jpg');
            background-size: cover; /* Kuvan koko säädetään sopimaan ilman leikkaamista */
            background-position: center; /* Kuva keskitetään */
            background-repeat: no-repeat; /* Estetään kuvan toisto */
            background-attachment: fixed; /* Kuva pysyy paikallaan scrollatessa */

        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    @include('inc.header')

    <div class="flex-grow">
        <!-- Pääsisältö -->
        <div class="container mx-auto py-8 text-center">
            <h1 class="text-5xl font-bold text-white">Eezy Car Renting</h1>
            <p class="mt-6 text-2xl text-white">Helppoa vuokrausta vaikeisiinkin olosuhteisiin vuodesta 1985</p>
            <div class="mt-12">
                <a href="{{ route('vuokraus.index') }}" class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded shadow">
                    Vuokraa
                </a>
            </div>
        </div>
    </div>
    @include('inc.footer')
</body>
</html>
