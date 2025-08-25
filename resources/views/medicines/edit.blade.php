@extends('layout')

@section('content')

<div class="max-w-lg border border-slate-400 mx-auto mt-10 p-6 rounded-lg shadow-2xl " style="background-color: #283D3B">
    <h1 class="font-jakarta uppercase text-2xl tracking-widest font-black text-white  mb-6">
      <span class="font-black text-gray-900"> {{$medicines->name}} </span> Szerkesztése
    </h1>

    <!-- Hibakezelés -->
    <x-error-handle/>

    <!-- Kategória szerkesztése -->
   <form action="{{ route('medicines.update', $medicines->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <fieldset class="flex flex-col ">
            <label for="category" class="font-jakarta uppercase text-2xl text-slate-200  mb-2">
               Kategória Név:
            </label>
            <input type="text" id="category" name="category" value="{{ old('name',$medicines->category )}}" required
            class="px-3 py-2 border w-[250px] text-white outline-none border-white rounded shadow-sm focus:outline-none  ">
        </fieldset>

        <button type="submit"
            class="w-full bg-green-800 hover:bg-green-700 text-white font-inter font-semibold px-4 py-2 rounded shadow transition-colors">
            Módosítás
        </button>
    </form>

</div>


@endsection