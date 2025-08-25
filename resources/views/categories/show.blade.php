@extends('layout')

@section('content')

<div class="container mx-auto px-4 py-8 text-white font-jakarta">
    <h1 class="text-2xl font-bold mb-6">Kategória Részletek</h1>
    
    <div class="bg-[#1C2A29] p-6 rounded shadow-md">
        <h2 class="text-xl font-semibold mb-4">{{ $category->name }}</h2>
    </div>
    <span>
        <a href="{{ route('categories.index') }}" class="text-sm hover:underline text-gray-400">
        Vissza az összes kategóriához
    </a>
    </span>
    <div>
        
        TODO: Listázd ki az adott kategóriához tartozó összes terméket
    </div>
</div>


@endsection
