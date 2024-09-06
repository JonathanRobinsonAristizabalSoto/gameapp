<?php

// Ubicación de este archivo: gameapp/database/factories/UserFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * La contraseña actual utilizada por la fábrica.
     */
    protected static ?string $password = null;

    /**
     * Define el estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Genera un género aleatorio
        $gender = fake()->randomElement(['Male', 'Female']);

        return [
            'document'          => fake()->isbn13(),
            'gender'            => $gender,
            'fullname'          => fake()->name($gender) . " " . fake()->lastName(),
            'birthdate'         => fake()->dateTimeBetween('-30 years', '2004-01-01'),
            'phone'             => fake()->phoneNumber(),
            // Genera una imagen y obtiene la ruta relativa
            'photo'             => substr(fake()->image($dir = './public/images', $width = 50, $height = 50), 13),
            'email'             => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            // Genera una contraseña hashed si no se ha establecido una
            'password'          => static::$password ??= Hash::make('password'),
            'remember_token'    => Str::random(10),
            'status'            => fake()->boolean(80), // 80% de probabilidad de estar activo
        ];
    }

    /**
     * Indica que la dirección de correo electrónico del modelo debe estar no verificada.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
