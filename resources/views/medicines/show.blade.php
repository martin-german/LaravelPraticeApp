@extends('layout')

@section('content')

<div class="container mx-auto px-4 py-8 text-white font-jakarta">
    <h1 class="text-2xl font-bold mb-6">{{ $medicines->name }} részletek</h1>
    
    <div class="bg-[#1C2A29] p-6 rounded shadow-md">
        <h1 class="text-xl font-semibold mb-4">{{ $medicines->name }}</h1>
        <h2 class="text-xs mb-4"> Kategória: {{ $medicines->category->name }}</h2>
        <h3 class="text-base mb-4"> {{$medicines->description}}</h3>
        <h4 class="text-sm mb-4"> Ár: {{$medicines->price}} Ft</h4>
        <h5 class="text-sm mb-4"> 
            Vényköteles: 
            {!! $medicines->needPresc 
            ? '<i class="fa-solid fa-check text-green-500"></i>' 
            : '<i class="fa-solid fa-x text-red-500"></i>' 
            !!}
        
        </h5>
        <p class="text-sm mb-4"> További információk: 
            <a href="{{ $medicines->link }}" target="_blank" class="text-blue-400 hover:underline">
                {{ Str::limit(trim($medicines->link),45) }}
            </a>
        </p>
        <div class="mt-4">
            @foreach ($medicines->tags as $tag)
                <span class="inline-block bg-yellow-500 text-gray-800 text-xs px-2 py-1 rounded-full mr-2 mb-2">
                    {{ $tag->name }}
                </span>
            @endforeach
        </div>
    </div>
     <span>
        <a href="{{ route('medicines.index') }}" class="text-sm hover:underline text-gray-400">
         Vissza az összes gyógyszerhez
        </a>
    </span>
</div>


@endsection
