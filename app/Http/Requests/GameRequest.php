<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Puedes agregar lógica de autorización aquí si es necesario
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
            'title' => 'required|unique:games|max:255',
            'developer' => 'required',
            'releasedate' => 'required|date',
            'category_id' => 'required|integer',
            'user_id' => 'required|integer',
            'price' => 'required|numeric',
            'genre' => 'required',
            'description' => 'required',
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
            'title.required' => 'El título es obligatorio.',
            'title.unique' => 'El título ya existe.',
            'title.max' => 'El título no puede tener más de 255 caracteres.',
            'developer.required' => 'El desarrollador es obligatorio.',
            'releasedate.required' => 'La fecha de lanzamiento es obligatoria.',
            'releasedate.date' => 'La fecha de lanzamiento debe ser una fecha válida.',
            'category_id.required' => 'La categoría es obligatoria.',
            'category_id.integer' => 'La categoría debe ser un número entero.',
            'user_id.required' => 'El usuario es obligatorio.',
            'user_id.integer' => 'El usuario debe ser un número entero.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'genre.required' => 'El género es obligatorio.',
            'description.required' => 'La descripción es obligatoria.',
        ];
    }
}
