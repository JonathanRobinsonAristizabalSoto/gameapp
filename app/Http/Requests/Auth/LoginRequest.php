<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'], // El campo email es obligatorio y debe ser una dirección de correo válida
            'password' => ['required', 'string', 'min:6'], // El campo contraseña es obligatorio y debe tener al menos 6 caracteres
        ];
    }

    /**
     * Obtiene los mensajes de validación personalizados para la solicitud.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => __('validation.custom.email.required'),
            'email.email' => __('validation.custom.email.email'),
            'password.required' => __('validation.custom.password.required'),
            'password.min' => __('validation.custom.password.min'),
        ];
    }

    /**
     * Intenta autenticar las credenciales proporcionadas en la solicitud.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        // Verifica que el usuario no haya excedido el límite de intentos fallidos
        $this->ensureIsNotRateLimited();

        // Intentar la autenticación con las credenciales proporcionadas
        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            // Incrementa el contador de intentos fallidos si la autenticación falla
            RateLimiter::hit($this->throttleKey());

            // Lanza una excepción con un mensaje de error si la autenticación falla
            throw ValidationException::withMessages([
                'email' => 'Las credenciales ingresadas no coinciden con nuestros registros.', // Mensaje personalizado de error
            ]);
        }

        // Restablece el contador de intentos fallidos si la autenticación es exitosa
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Verifica que la solicitud de inicio de sesión no exceda el límite de intentos.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        // Comprueba si el usuario ha superado el límite de intentos fallidos (5 intentos en este caso)
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        // Dispara un evento de bloqueo si se excede el límite
        event(new Lockout($this));

        // Calcula los segundos restantes antes de que el usuario pueda intentar nuevamente
        $seconds = RateLimiter::availableIn($this->throttleKey());

        // Lanza una excepción con un mensaje que indica el tiempo de espera
        throw ValidationException::withMessages([
            'email' => 'Demasiados intentos fallidos. Por favor intenta de nuevo en :seconds segundos o :minutes minutos.', // Mensaje personalizado de bloqueo
        ]);
    }

    /**
     * Genera la clave única de limitación de intentos para la solicitud.
     */
    public function throttleKey(): string
    {
        // Genera una clave única combinando el email en minúsculas y la IP del usuario
        return Str::slug(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
