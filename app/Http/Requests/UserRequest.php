<?php

// ubicación: gameapp/app/Http/Requests/UserRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado a realizar esta solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        // Permitir que cualquier usuario realice esta solicitud.
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'document' => 'required|integer|unique:users,document', // El documento es obligatorio, debe ser un entero y único en la tabla de usuarios.
            'fullname' => 'required|string|max:255', // El nombre completo es obligatorio, debe ser una cadena y no puede exceder los 255 caracteres.
            'gender' => 'required|string', // El género es obligatorio y debe ser una cadena.
            'email' => 'required|string|email|max:255|unique:users,email', // El correo electrónico es obligatorio, debe ser una cadena, un correo válido, no puede exceder los 255 caracteres y debe ser único en la tabla de usuarios.
            'phone' => 'required|string|max:20', // El teléfono es obligatorio, debe ser una cadena y no puede exceder los 20 caracteres.
            'birthdate' => 'required|date', // La fecha de nacimiento es obligatoria y debe ser una fecha válida.
            'password' => 'required|string|confirmed|min:8', // La contraseña es obligatoria, debe ser una cadena, debe ser confirmada y debe tener al menos 8 caracteres.
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // La foto es opcional, debe ser una imagen y puede ser de tipo jpeg, png o jpg, y no puede exceder los 2048 KB.
        ];
    }
}
