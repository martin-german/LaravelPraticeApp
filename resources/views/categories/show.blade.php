@extends('layouts.main-layout')

@section('content')

<div class="container mx-auto px-4 py-8 text-white font-jakarta">
    <h1 class="text-2xl font-bold mb-6">Kategória Részletek</h1>
    
    <div class="bg-[#1C2A29] p-6 rounded shadow-md mb-6">
        <h2 class="text-xl font-semibold mb-4">{{ $category->name }}</h2>
        
        {{-- Vényköteles termékek --}}
        <h3 class="text-lg font-medium mb-3">Vényköteles termékek:</h3>
        <ul class="space-y-2 mb-6">
            @foreach ($category->medicines->where('needPresc', true) as $medicine)
                <li class="bg-[#2A3B3A] p-3 sm:p-4 rounded shadow-md hover:bg-green-800 transition-colors">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold text-sm sm:text-base">{{ $medicine->name }}</span>
                        <div class="space-x-2 sm:space-x-4">
                            <a href="{{ route('medicines.show', $medicine->id) }}"
                               class="text-xs sm:text-sm hover:underline text-white">
                               Megtekintés
                            </a>
                            @if(auth()->check())
                                <a href="{{ route('medicines.edit', $medicine->id) }}"
                                class="text-xs sm:text-sm hover:underline text-gray-400">
                                Szerkesztés
                                </a>
                                <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs sm:text-sm hover:underline text-red-500"
                                            onclick="return confirm('Biztosan törölni szeretnéd ezt a terméket?')">
                                        Törlés
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        
        {{-- Nem vényköteles termékek --}}
        <h3 class="text-lg font-medium mb-3">Nem vényköteles termékek:</h3>
        <ul class="space-y-2">
            @foreach ($category->medicines->where('needPresc', false) as $medicine)
                <li class="bg-[#2A3B3A] p-3 sm:p-4 rounded shadow-md hover:bg-green-800 transition-colors">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold text-sm sm:text-base">{{ $medicine->name }}</span>
                        <div class="space-x-2 sm:space-x-4">
                            <a href="{{ route('medicines.show', $medicine->id) }}"
                               class="text-xs sm:text-sm hover:underline text-white">
                               Megtekintés
                            </a>
                            <!-- Ha a user nincs belépve nem mutatja a routokat.-->
                            @if(auth()->check())
                                <a href="{{ route('medicines.edit', $medicine->id) }}"
                                class="text-xs sm:text-sm hover:underline text-gray-400">
                                Szerkesztés
                                </a>
                                <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs sm:text-sm hover:underline text-red-500"
                                            onclick="return confirm('Biztosan törölni szeretnéd ezt a terméket?')">
                                        Törlés
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    
    <a href="{{ route('categories.index') }}" class="text-sm hover:underline text-gray-400">
        Vissza az összes kategóriához
    </a>
</div>

@endsection