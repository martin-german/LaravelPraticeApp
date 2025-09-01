<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
        return [
                'name' => 'required|min:3|max:255',
        ];
    }

    public function messages(): array {
        return [
                'name.required' => 'A kategória neve megadása kötelező.',
                'name.min' => 'A kategória neve legalább 3 karakter hosszúnak kell legyen.',
                'name.max' => 'A kategória neve maximum 255 karakter hosszú lehet.',
            ];
    }
}
