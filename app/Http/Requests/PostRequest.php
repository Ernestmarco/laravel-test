<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'titol' => 'required|min:5',
            'contingut' => 'required|min:50'
        ];
    }

    public function messages(): array
    {
        return [
            'titol.required' => 'El títol és obligatori.',
            'titol.min' => 'La longitud mínima del títol és de 5',
            'contingut.required' => 'El contingut és obligatori.',
            'contingut.min' => 'La longitud mínima del contingut és de 50',
        ];
    }

    
}
