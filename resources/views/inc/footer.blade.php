<footer class="bg-black py-4 mt-8 text-white opacity-75">
    <div class="container mx-auto text-center">
        <p>&copy; {{ date('Y') }} Eeze Renting. Kaikki oikeudet pidätetään.</p>
        <div class="flex justify-center mt-4 space-x-4">
            <a href="{{ route('tietosuoja') }}" class="hover:text-blue-400">Tietosuoja</a>
            <a href="{{ route('kayttoehdot') }}" class="hover:text-blue-400">Käyttöehdot</a>
            <a href="{{ route('yhteytta') }}" class="hover:text-blue-400">Ota yhteyttä</a>
        </div>
    </div>
</footer>
