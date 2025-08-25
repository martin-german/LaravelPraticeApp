@extends('layout')

@section('content')
<div class="max-w-lg border border-slate-400 mx-auto mt-10 p-6 rounded-lg shadow-2xl" style="background-color: #283D3B">
    <h1 class="font-jakarta uppercase text-3xl tracking-widest font-black text-white  mb-6">
        Új Kategória
    </h1>

    <!-- Hibakezelés -->
    <x-error-handle/>

    <!-- Új kategória léterhozás -->
    <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
        @csrf
        <fieldset class="flex flex-col">
            <label for="name" class="font-jakarta text-slate-200  mb-2">
                Név:
            </label>
            <input type="text" id="name" name="name" required
                class="px-3 py-2 border text-white outline-none border-white rounded shadow-sm focus:outline-none  ">
        </fieldset>

        <button type="submit"
            class="w-full bg-green-800 hover:bg-green-700 text-white font-inter font-semibold px-4 py-2 rounded shadow transition-colors">
            Létrehozás
        </button>
    </form>

</div>
@endsection
