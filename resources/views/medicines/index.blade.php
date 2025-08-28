@extends('layout')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 text-white font-jakarta">
        <div class="flex items-center justify-between">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-4 sm:mb-6">
                Összes Gyógyszer
            </h1>
            <!-- Hozzadás btn -->
            <x-create-button route="medicines.create"/>
        </div>
        <!-- Link a hatóanyagokhoz és rendezés -->
        <div class="flex flex-grow justify-between mb-4 sm:mb-6">
            <a href="{{ route('tags.index') }}" class="hover:text-green-700 hover:underline">Hatóanyagok megtekintése</a>
             <span class="space-x-2 text-center items-center text-sm sm:text-base">
                    <a href="{{route('medicines.index',array_merge(request()->query(),['sort_by' => 'name', 'sort_dir' => 'asc']))}}">Rendezés A-Z</a>
                    <a href="{{route('medicines.index',array_merge(request()->query(),['sort_by' => 'name', 'sort_dir' => 'desc']))}}">| Rendezés Z-A</a>
            </span>
        </div>

        <!-- Sikeres létrehozás -->
        @if (session('success'))
            <div class="mb-4 p-3 rounded bg-green-800 text-green-200 text-center text-2xl sm:text-xl">
                {{ session('success') }}
            </div>
        @endif
         <!-- Kategóriák CRUD  -->
        <ul class="space-y-2 sm:space-y-3">
        @foreach ($medicines as $medicine)
            <li class="bg-[#1C2A29] p-3 sm:p-4 rounded shadow-md hover:bg-green-800 transition-colors">
                <span class="font-semibold text-sm sm:text-base">{{ $medicine->name }}
                <!-- Hatóanyaog(tagek) -->    
                <span class="ml-4">
                    @foreach ($medicine->tags as $tag)
                        <span class="inline-block bg-yellow-700 text-white text-xs px-2 py-1 rounded-full mr-2 mb-2">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </span>
                </span>
                <span class="float-right">
                    <a href="{{ route('medicines.show', $medicine->id) }}"
                       class="ml-2 sm:ml-4 text-xs sm:text-sm hover:underline text-white">
                       Megtekintés
                    </a>
                    <a href="{{ route('medicines.edit', $medicine->id) }}"
                       class="ml-2 sm:ml-4 text-xs sm:text-sm hover:underline text-gray-400">
                       Szerkesztés
                    </a>
                    <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" class="inline">
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
        {{ $medicines->withqueryString()->links() }}    
</div>
@endsection