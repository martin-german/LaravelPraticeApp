@props(['fields' => []])

@php
    $hasErrors = false;
    $errorMessages = collect();
    
    if(empty($fields)) {
        // Ha nincs megadva mező, az összes hibát megjelenítjük
        $hasErrors = $errors->any();
        $errorMessages = collect($errors->all());
    } else {
        // Ha megvannak adva a mezők, csak azokat ellenőrizzük
        foreach($fields as $field) {
            if($errors->has($field)) {
                $hasErrors = true;
                $errorMessages->push($errors->first($field));
            }
        }
    }
@endphp

@if($hasErrors)
    <div class="bg-yellow-100 border-l-4 text-sm border-yellow-500 text-yellow-700 p-4 mb-4 rounded" role="alert">
        @foreach($errorMessages as $message)
            <p class="font-jakarta">{{ $message }}</p>
        @endforeach
    </div>
@endif