@extends('layout')

@section('content')

<div class="max-w-lg border border-slate-400 mx-auto mt-10 p-6 rounded-lg shadow-2xl " style="background-color: #283D3B">
    <h1 class="font-jakarta uppercase text-2xl tracking-widest font-black text-white  mb-6">
      <span class="font-black text-gray-900"> {{$medicines->name}} </span> Szerkesztése
    </h1>

    <!-- Hibakezelés -->
    <x-error-handle/>

    <!-- Gyógyszer szerkesztése -->
   <form action="{{ route('medicines.update', $medicines->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <fieldset class="flex flex-col space-y-4">
            <label for="category_id" class="font-jakarta uppercase text-2xl text-slate-200  mb-2">
                Kategória:
            </label>
            <select id="category_id" name="category_id" required
            class="px-3 py-2 border outline-none text-white border-white rounded shadow-sm focus:outline-none"
            >
            @foreach ($categories as $category)
                <option class="text-black" value="{{ $category->id }}"
                    {{ old('category_id', $medicines->category_id) 
                    == $category->id 
                    ? 'selected' 
                    : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
            </select>
        </fieldset>

        <fieldset class="flex flex-col ">
            <label for="name" class="font-jakarta uppercase text-2xl text-slate-200  mb-2">
               Gyógyszer neve:
            </label>
            <input type="text" id="name" name="name" value="{{ old('name',$medicines->name )}}" required
            class="px-3 py-2 border w-[250px] text-white outline-none border-white rounded shadow-sm focus:outline-none  "
            />
        </fieldset>

        <fieldset class="flex flex-col ">
            <label for="description" class="font-jakarta uppercase text-2xl text-slate-200  mb-2">
               Leírás:
            </label>
            <textarea type="text" id="description" name="description" required
                class="px-3 resize-none w-full h-[150px] py-2 border text-white outline-none border-white rounded shadow-sm focus:outline-none"
            =>{{ old('description', $medicines->description) }}
            </textarea>
        </fieldset>

        <fieldset class="flex flex-col ">
            <label for="link" class="font-jakarta uppercase text-2xl text-slate-200  mb-2">
            Link:
            </label>
            <input type="text" id="link" name="link" value="{{ old('link',$medicines->link )}}" required
            class="px-3 py-2 border w-[250px] text-white outline-none border-white rounded shadow-sm focus:outline-none  "/>
        </fieldset>

        <fieldset class="flex flex-row space-x-1">
            <label for="needPresc" class="font-jakarta text-slate-200  mb-2">
            Vényköteles:
            </label>
            <input type="hidden" name="needPresc" value="0">
            <input type="checkbox" id="needPresc" name="needPresc" value="1"
            {{ old('needPresc',$medicines->needPresc ? 'checked' : '')}} 
                class="text-white outline-none border-white "
            />
        </fieldset>

        <button type="submit"
            class="w-full bg-green-800 hover:bg-green-700 text-white font-inter font-semibold px-4 py-2 rounded shadow transition-colors">
            Módosítás
        </button>
    </form>

</div>


@endsection