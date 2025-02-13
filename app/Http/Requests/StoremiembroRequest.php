<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoremiembroRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'cod' => 'required|string|max:255|unique:miembros,cod',
            'fecha_entrada' => 'nullable|date',
            'rango' => 'required|integer|between:1,5',
        ];
    }


    public function messages(): array {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.string' => 'El nombre debe ser una cadena',
            'name.max' => 'El nombre no puede exceder los 255 caracteres',
            'cod.required' => 'El código es obligatorio',
            'cod.number' => 'El código debe ser un número',
            'fecha_entrada.required' => 'La fecha de entrada es obligatoria',
            'rango.required' => 'El rango es obligatorio',
            'rango.number' => 'El rango debe ser un número',
            'rango.max' => 'El rango no puede exceder los 5 valores'
        ];
    }
}
