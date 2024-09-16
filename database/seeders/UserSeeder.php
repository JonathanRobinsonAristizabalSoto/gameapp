<?php

// ubicación: gameapp/database/seeders/UserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Crear un usuario administrador
        User::create([
            'document' => '1053810807',
            'fullname' => 'Jonathan Aristizabal',
            'gender' => 'Male',
            'birthdate' => '1990-12-30', // Formato Y-m-d
            'phone' => '3187542709',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin1234'),
            'role' => 'admin',
            'photo' => 'perfilm1.jpg', // Ruta de la foto sin 'images/'
        ]);

        // Crear un usuario moderador
        User::create([
            'document' => '75201030',
            'fullname' => 'Martin Aristizabal',
            'gender' => 'Male',
            'birthdate' => '1990-08-30', // Formato Y-m-d
            'phone' => '45321246',
            'email' => 'moderator@gmail.com',
            'password' => Hash::make('Moderator1234'),
            'role' => 'moderator',
            'photo' => 'perfilm3.jpg', // Ruta de la foto sin 'images/'
        ]);

        // Crear un usuario
        User::create([
            'document' => '9876543',
            'fullname' => 'Gloria Corrales',
            'gender' => 'Female',
            'birthdate' => '1990-07-15', // Formato Y-m-d
            'phone' => '3216549870',
            'email' => 'user@gmail.com',
            'password' => Hash::make('User1234'),
            'role' => 'user',
            'photo' => 'perfilf1.jpg', // Ruta de la foto sin 'images/'
        ]);

        // Puedes agregar más usuarios si lo necesitas
        // Eliminar la creación de usuarios ficticios si no es necesaria
        // User::factory(50)->create();
    }
}
