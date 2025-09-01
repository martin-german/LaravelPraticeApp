<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicinesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return  [
                'category_id' => 'required|exists:categories,id',
                'name' => 'required|min:3|max:255',
                'description' => 'required|min:10',
                'link' => 'required|url',
                'needPresc' => 'boolean',
                'price' => 'nullable|numeric|max:99999',
        ];
    }

    public function messages(): array
    {
     return  [
                'category_id.required' => 'A kategória kiválasztása kötelező.',
                'category_id.exists' => 'A kiválasztott kategória érvénytelen.',
                'name.required' => 'A gyógyszer neve megadása kötelező.',
                'name.min' => 'A gyógyszer neve legalább 3 karakter hosszúnak kell legyen.',
                'name.max' => 'A gyógyszer neve maximum 255 karakter hosszú lehet.',
                'description.required' => 'A leírás megadása kötelező.',
                'description.min' => 'A leírásnak legalább 10 karakter hosszúnak kell lennie.',
                'link.required' => 'A link megadása kötelező.',
                'link.url' => 'A megadott link nem érvényes URL.',
                'needPresc.boolean' => 'Az "Szükséges recept" mező csak igaz vagy hamis értéket fogadhat el.',
                'price.numeric' => 'Az árnak numerikus értéknek kell lennie.',
                'price.min' => 'Az ár nem lehet negatív szám.',
     ];
    }
}
