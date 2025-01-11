<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Käyttöehdot</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background-image: url('/image/jeep1.jpg'); /* Päivitä polku tarpeen mukaan */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    @include('inc.header')

    <div class="container mx-auto py-8 flex-grow max-w-4xl bg-black bg-opacity-50 text-white p-6 rounded shadow-md mt-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Käyttöehdot</h1>
        <p class="mb-4">
            Tervetuloa käyttämään Eezy renting verkkosivustoa. Käyttämällä tätä verkkosivustoa hyväksyt seuraavat käyttöehdot:
        </p>
        <h2 class="text-2xl font-semibold mb-4">1. Yleiset ehdot</h2>
        <p class="mb-4">
            Sivuston käyttö on sallittua vain henkilökohtaiseen ja ei-kaupalliseen tarkoitukseen. Et saa kopioida, jäljentää tai jakaa sisältöä ilman lupaa.
        </p>
        <h2 class="text-2xl font-semibold mb-4">2. Tietojen oikeellisuus</h2>
        <p class="mb-4">
            Teemme parhaamme pitääksemme tiedot ajan tasalla, mutta emme takaa täydellistä tarkkuutta. Vuokraamo ei vastaa mahdollisista virheistä tai puutteista.
        </p>
        <h2 class="text-2xl font-semibold mb-4">3. Käyttäjän vastuut</h2>
        <p class="mb-4">
            Käyttäjänä sitoudut käyttämään palvelua vastuullisesti ja noudattamaan kaikkia sovellettavia lakeja ja sääntöjä.
        </p>
        <h2 class="text-2xl font-semibold mb-4">4. Vastuunrajoitus</h2>
        <p class="mb-4">
            Vuokraamo ei ole vastuussa suorista tai epäsuorista vahingoista, jotka aiheutuvat tämän sivuston käytöstä.
        </p>
        <h2 class="text-2xl font-semibold mb-4">5. Muutokset</h2>
        <p class="mb-4">
            Pidätämme oikeuden muuttaa näitä käyttöehtoja milloin tahansa ilman ennakkoilmoitusta. Suosittelemme tarkistamaan käyttöehdot säännöllisesti.
        </p>
        <p class="mt-6">Jos sinulla on kysyttävää, ota yhteyttä asiakaspalveluumme.</p>
    </div>

    @include('inc.footer')
</body>
</html>
