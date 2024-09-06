<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Puedes agregar lógica para verificar si el usuario está autorizado
        // para hacer esta solicitud. Por ahora, devolvemos true.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string|max:1000',
            'releasedate' => 'required|date', // Nueva regla de validación para releasedate
            // Agrega aquí cualquier otro campo adicional
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El nombre de la categoría es obligatorio.',
            'name.string' => 'El nombre de la categoría debe ser una cadena de texto.',
            'name.max' => 'El nombre de la categoría no debe exceder los 255 caracteres.',
            'manufacturer.required' => 'El fabricante es obligatorio.',
            'manufacturer.string' => 'El fabricante debe ser una cadena de texto.',
            'manufacturer.max' => 'El fabricante no debe exceder los 255 caracteres.',
            'image.image' => 'La imagen debe ser un archivo de imagen.',
            'image.mimes' => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg.',
            'image.max' => 'La imagen no debe exceder los 2048 kilobytes.',
            'description.string' => 'La descripción debe ser una cadena de texto.',
            'description.max' => 'La descripción no debe exceder los 1000 caracteres.',
            'releasedate.required' => 'La fecha de lanzamiento es obligatoria.',
            'releasedate.date' => 'La fecha de lanzamiento debe ser una fecha válida.',
            // Agrega aquí cualquier otro mensaje de error personalizado
        ];
    }
}