@extends('layout')

@section('content')
<div class="max-w-lg border border-slate-400 mx-auto mt-10 p-6 rounded-lg shadow-2xl" style="background-color: #283D3B">
    <h1 class="font-jakarta uppercase text-3xl tracking-widest font-black text-white  mb-6">
        Új Gyógyszer Hozzáadása
    </h1>

    <!-- Hibakezelés -->
    <x-error-handle/>
    <!-- Új kategória léterhozás -->
    <form action="{{ route('medicines.store') }}" method="POST" class="space-y-4">
        @csrf
        <fieldset class="flex flex-col space-y-4">
            <label for="name" class="font-jakarta text-slate-200  mb-2">
                Gyógyszer neve:
            </label>
            <input type="text" id="name" name="name" required
                class="px-3 py-2 border text-white outline-none border-white rounded shadow-sm focus:outline-none"
            />
        </fieldset>

        <fieldset class="flex flex-col space-y-4">
            <label for="category_id" class="font-jakarta text-slate-200  mb-2">
                Kategória:
            </label>
            <select id="category_id" name="category_id" required
                class="px-3 py-2 border outline-none text-white border-white rounded shadow-sm focus:outline-none"
            >
            @foreach ($categories as $category)
                <option class="text-black" value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
            </select>
        </fieldset>

        <fieldset class="flex flex-col space-y-4">
            <label for="description" class="font-jakarta text-slate-200  mb-2">
                Leírás:
            </label>
            <textarea type="text" id="description" name="description" required
                class="px-3 resize-none w-full h-[150px] py-2 border text-white outline-none border-white rounded shadow-sm focus:outline-none"
            ></textarea>
        </fieldset>

        <fieldset class="flex flex-col space-y-4">
            <label for="link" class="font-jakarta text-slate-200  mb-2">
                Link:
            </label>
            <input type="text" id="link" name="link" required
                class="px-3 py-2 border text-white outline-none border-white rounded shadow-sm focus:outline-none"
            />
        </fieldset>

        <fieldset class="flex flex-row space-x-1">
            <label for="needPresc" class="font-jakarta text-slate-200  mb-2">
                Vényköteles:
            </label>
            <input type="checkbox" id="needPresc" name="needPresc"
            />
        </fieldset>
        <fieldset class="flex flex-col space-y-4">
            <label for="price" class="font-jakarta text-slate-200  mb-2">
                Ár:
            </label>
            <input type="number" id="price" name="price"
                class="px-3 py-2 border text-white outline-none border-white rounded shadow-sm focus:outline-none" 
            /> 
        </fieldset>

        <button type="submit"
            class="w-full bg-green-800 hover:bg-green-700 text-white font-inter font-semibold px-4 py-2 rounded shadow transition-colors">
            Hozzáadás
        </button>
    </form>

</div>
@endsection
