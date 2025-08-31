<nav class="absolute left-1/2 -translate-x-1/2 tracking-wider">
    <ul class="flex space-x-2 sm:space-x-3 md:space-x-4 lg:space-x-6">
        <li class="list-none">
            <a href="{{ route('categories.index') }}" 
            class="text-white font-jakarta font-semibold uppercase 
            text-xs sm:text-sm md:text-base lg:text-lg 
            hover:underline decoration-2 decoration-green-700 underline-offset-8">
            Kategóriák
            </a>
        </li>

        <li class="list-none">
            <a href=" {{ route('medicines.index') }} "
            class="text-white font-jakarta font-semibold uppercase 
            text-xs sm:text-sm md:text-base lg:text-lg 
            hover:underline decoration-2 decoration-green-700 underline-offset-8">
            Gyógyszerek
            </a>
        </li>

        @if (auth()->check())
            <li class="list-none">
                <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="text-white font-jakarta font-semibold uppercase 
                        text-xs sm:text-sm md:text-base lg:text-lg 
                        hover:underline decoration-2 decoration-green-700 underline-offset-8">
                        Kijelentkezés <span class="text-xs"></br>{{ auth()->user()->name}}</span>
                        </button>
                </form>
            </li>
        @else
            <li class="list-none">
                <a href=" {{ route('login') }} "
                class="text-white font-jakarta font-semibold uppercase 
                text-xs sm:text-sm md:text-base lg:text-lg 
                hover:underline decoration-2 decoration-green-700 underline-offset-8">
                Bejelentkezés
                </a>
            </li>
        @endif
    </ul>
</nav>