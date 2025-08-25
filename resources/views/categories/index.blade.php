@extends('layout')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 text-white font-jakarta">
        <div class="flex items-center justify-between">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-4 sm:mb-6">
                Összes Kategória
            </h1>

            <!-- Hozzadás btn -->
            <x-create-button route="categories.create"/>

     </div>
     
        <!-- Sikeres létrehozás -->
        @if (session('success'))
            <div class="mb-4 p-3 rounded bg-green-800 text-green-200 text-sm sm:text-base">
                {{ session('success') }}
            </div>
        @endif

        <!-- Kategóriák CRUD  -->
        <ul class="space-y-2 sm:space-y-3">
        @foreach ($categories as $category)
            <li class="bg-[#1C2A29] p-3 sm:p-4 rounded shadow-md hover:bg-green-800 transition-colors">
                <span class="font-semibold text-sm sm:text-base">{{ $category->name }}</span>
                <span class="float-right">
                    <a href="{{ route('categories.show', $category->id) }}"
                       class="ml-2 sm:ml-4 text-xs sm:text-sm hover:underline text-white">Megtekintés
                    </a>
                    <a href="{{ route('categories.edit', $category->id) }}"
                       class="ml-2 sm:ml-4 text-xs sm:text-sm hover:underline text-gray-400">Szerkesztés
                    </a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ml-2 sm:ml-4 text-xs sm:text-sm hover:underline text-red-500"
                                onclick="return confirm('Biztosan törölni szeretnéd ezt a kategóriát?')">Törlés
                        </button>
                    </form>
                </span>
            </li>
        @endforeach
        </ul>
    </div>
@endsection