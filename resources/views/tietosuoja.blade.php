@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 bg-black bg-opacity-50 text-white p-6 rounded shadow-md max-w-3xl">
    <h1 class="text-2xl font-bold mb-6 text-center">Tietosuojaseloste</h1>

    <h2 class="text-xl font-bold mt-4 mb-2">1. Rekisterinpitäjä</h2>
    <p class="mb-4">
        Eeze Renting<br>
        Yhteystiedot: <a href="mailto:info@eezerenting.fi" class="text-blue-400 hover:underline">info@eezerenting.fi</a>
    </p>

    <h2 class="text-xl font-bold mt-4 mb-2">2. Käsiteltävät henkilötiedot</h2>
    <ul class="list-disc list-inside mb-4">
        <li>Nimi</li>
        <li>Sähköposti</li>
        <li>Puhelinnumero</li>
        <li>Osoitetiedot</li>
        <li>Mahdolliset muut vuokraustoimintaan liittyvät tiedot</li>
    </ul>

    <h2 class="text-xl font-bold mt-4 mb-2">3. Tietojen käyttötarkoitus</h2>
    <p class="mb-4">
        Henkilötietoja käsitellään seuraaviin tarkoituksiin:
    </p>
    <ul class="list-disc list-inside mb-4">
        <li>Vuokrauspalveluiden tarjoaminen ja hallinta</li>
        <li>Asiakassuhteen hoito ja viestintä</li>
        <li>Lakisääteisten velvoitteiden täyttäminen</li>
    </ul>

    <h2 class="text-xl font-bold mt-4 mb-2">4. Tietojen säilytys</h2>
    <p class="mb-4">
        Henkilötiedot säilytetään vain niin kauan kuin se on tarpeellista palveluiden tarjoamiseksi tai lakisääteisten vaatimusten täyttämiseksi.
    </p>

    <h2 class="text-xl font-bold mt-4 mb-2">5. Tietojen luovutus</h2>
    <p class="mb-4">
        Tietoja ei luovuteta kolmansille osapuolille ilman asiakkaan suostumusta, ellei laki muuta edellytä.
    </p>

    <h2 class="text-xl font-bold mt-4 mb-2">6. Rekisteröidyn oikeudet</h2>
    <p class="mb-4">
        Rekisteröidyllä on oikeus:
    </p>
    <ul class="list-disc list-inside mb-4">
        <li>Saada pääsy omiin tietoihinsa</li>
        <li>Pyytää tietojen korjaamista tai poistamista</li>
        <li>Vastustaa tietojen käsittelyä tietyissä tilanteissa</li>
    </ul>
    <p>
        Yhteydenotot tietosuojaan liittyvissä asioissa: <a href="mailto:tietosuoja@eezerenting.fi" class="text-blue-400 hover:underline">tietosuoja@eezerenting.fi</a>
    </p>
</div>
@endsection
