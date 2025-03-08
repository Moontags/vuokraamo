<header class="bg-black shadow-sm bg-opacity-50">
    <div class="container mx-auto px-4 py-6 flex items-center justify-between">
        <a href="{{ url('/') }}" class="text-lg font-bold text-white px-6">
            RentXpress
        </a>

        <nav
            id="mobile-menu"
            class="hidden md:flex md:space-x-8 absolute md:relative top-full left-0 w-full bg-black md:bg-transparent md:w-auto flex-col md:flex-row md:items-center"
        >

            @if(isset(Auth::user()->role) && Auth::user()->role === 'admin')
                <a href="{{ url('/asiakas') }}" class="block text-white hover:text-blue-500 px-4 py-2 md:py-0">Asiakas</a>
                <a href="{{ url('/myyja') }}" class="block text-white hover:text-blue-500 px-4 py-2 md:py-0">Henkilökunta</a>
            @endif

            <a href="{{ url('/tuote') }}" class="block text-white hover:text-blue-500 px-4 py-2 md:py-0">Mallisto</a>
            <a href="{{ url('/vuokraus') }}" class="block text-white hover:text-blue-500 px-4 py-2 md:py-0">Vuokraus</a>
        </nav>

        <div class="flex items-center space-x-4">
            @auth
                <form action="{{ route('ulos') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white hover:text-red-500 flex items-center">
                        <i class="bi bi-box-arrow-right text-lg"></i>
                        <span class="ml-1">Ulos</span>
                    </button>
                </form>
            @endauth
        </div>
    </div>
</header>
