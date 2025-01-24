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

    @include('inc.header')

    <div class="flex-grow">

        <div class="container mx-auto py-8 text-center">
            <h1 class="text-5xl font-bold text-white">RentXpress</h1>
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
