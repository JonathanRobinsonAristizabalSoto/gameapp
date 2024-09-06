<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creación de juegos ficticios
        Game::create([
            'title' => 'Halo Infinite',
            'developer' => '343 Industries',
            'releasedate' => '2021-12-08',
            'category_id' => 1,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Shooter',
            'description' => '¡Prepárate para la última entrega de la épica saga de Halo!',
            'image' => 'halo.jpg',
        ]);

        Game::create([
            'title' => 'Super Mario Odyssey',
            'developer' => 'Nintendo EPD',
            'releasedate' => '2017-10-27',
            'category_id' => 2,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Arcade',
            'description' => 'Únete a Mario en una nueva aventura por diferentes mundos para salvar a la Princesa Peach de Bowser.',
            'image' => 'mario.jpg',
        ]);

        Game::create([
            'title' => 'Spider-Man: Miles Morales',
            'developer' => 'Insomniac Games',
            'releasedate' => '2020-11-12',
            'category_id' => 3,
            'user_id' => 1,
            'price' => 69.99,
            'genre' => 'Acción y aventura',
            'description' => '¡Embárcate en una nueva aventura como Miles Morales en la ciudad de Nueva York!',
            'image' => 'spiderman.jpg',
        ]);
    }
}

