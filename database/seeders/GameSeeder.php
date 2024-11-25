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
        // Creación de juegos ficticios para Xbox Series X categoria 1
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
            'slider' => 1,
        ]);

        Game::create([
            'title' => 'Forza Horizon 5',
            'developer' => 'Playground Games',
            'releasedate' => '2021-11-09',
            'category_id' => 1,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Carreras',
            'description' => 'Explora el vibrante mundo abierto de México en Forza Horizon 5.',
            'image' => 'forza.jpg',
            'slider' => 0,
        ]);

        Game::create([
            'title' => 'Gears 5',
            'developer' => 'The Coalition',
            'releasedate' => '2019-09-10',
            'category_id' => 1,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Shooter',
            'description' => 'Continúa la saga de Gears of War con Gears 5.',
            'image' => 'gears5.jpg',
            'slider' => 0,
        ]);

        // Creación de juegos ficticios para Xbox One categoria 2
        Game::create([
            'title' => 'Halo 5: Guardians',
            'developer' => '343 Industries',
            'releasedate' => '2015-10-27',
            'category_id' => 2,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Shooter',
            'description' => 'Únete al Jefe Maestro en su búsqueda para salvar a la humanidad en Halo 5: Guardians.',
            'image' => 'halo5.jpg',
            'slider' => 0,
        ]);

        Game::create([
            'title' => 'Forza Motorsport 7',
            'developer' => 'Turn 10 Studios',
            'releasedate' => '2017-10-03',
            'category_id' => 2,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Carreras',
            'description' => 'Compite en emocionantes carreras en Forza Motorsport 7.',
            'image' => 'forza7.jpg',
            'slider' => 0,
        ]);

        Game::create([
            'title' => 'Gears of War 4',
            'developer' => 'The Coalition',
            'releasedate' => '2016-10-11',
            'category_id' => 2,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Shooter',
            'description' => 'Continúa la saga de Gears of War con Gears of War 4.',
            'image' => 'gears4.jpg',
            'slider' => 0,
        ]);

        // Creación de juegos ficticios para Xbox 360 categoria 3
        Game::create([
            'title' => 'Halo 3',
            'developer' => 'Bungie',
            'releasedate' => '2007-09-25',
            'category_id' => 3,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Shooter',
            'description' => 'Únete al Jefe Maestro en su lucha contra el Covenant en Halo 3.',
            'image' => 'halo3.jpg',
            'slider' => 0,
        ]);

        Game::create([
            'title' => 'Gears of War 3',
            'developer' => 'Epic Games',
            'releasedate' => '2011-09-20',
            'category_id' => 3,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Shooter',
            'description' => 'Continúa la lucha contra los Locust en Gears of War 3.',
            'image' => 'gears3.jpg',
            'slider' => 0,
        ]);

        Game::create([
            'title' => 'Forza Motorsport 4',
            'developer' => 'Turn 10 Studios',
            'releasedate' => '2011-10-11',
            'category_id' => 3,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Carreras',
            'description' => 'Compite en emocionantes carreras en Forza Motorsport 4.',
            'image' => 'forza4.jpg',
            'slider' => 0,
        ]);

        // Creación de juegos ficticios para Nintendo Switch categoria 4
        Game::create([
            'title' => 'Super Mario Odyssey',
            'developer' => 'Nintendo EPD',
            'releasedate' => '2017-10-27',
            'category_id' => 4,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Arcade',
            'description' => 'Únete a Mario en una nueva aventura por diferentes mundos para salvar a la Princesa Peach de Bowser.',
            'image' => 'mario.jpg',
            'slider' => 1,
        ]);

        Game::create([
            'title' => 'The Legend of Zelda: Breath of the Wild',
            'developer' => 'Nintendo EPD',
            'releasedate' => '2017-03-03',
            'category_id' => 4,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Aventura',
            'description' => 'Explora el vasto mundo de Hyrule en The Legend of Zelda: Breath of the Wild.',
            'image' => 'zelda.jpg',
            'slider' => 0,
        ]);

        Game::create([
            'title' => 'Animal Crossing: New Horizons',
            'developer' => 'Nintendo EPD',
            'releasedate' => '2020-03-20',
            'category_id' => 4,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Simulación',
            'description' => 'Crea tu propia isla paradisíaca en Animal Crossing: New Horizons.',
            'image' => 'animal_crossing.jpg',
            'slider' => 0,
        ]);

        // Creación de juegos ficticios para Nintendo 3DS categoria 5
        Game::create([
            'title' => 'Pokémon Sun',
            'developer' => 'Game Freak',
            'releasedate' => '2016-11-18',
            'category_id' => 5,
            'user_id' => 1,
            'price' => 39.99,
            'genre' => 'RPG',
            'description' => 'Embárcate en una nueva aventura Pokémon en la región de Alola en Pokémon Sun.',
            'image' => 'pokemon_sun.jpg',
            'slider' => 0,
        ]);

        Game::create([
            'title' => 'The Legend of Zelda: A Link Between Worlds',
            'developer' => 'Nintendo EAD',
            'releasedate' => '2013-11-22',
            'category_id' => 5,
            'user_id' => 1,
            'price' => 39.99,
            'genre' => 'Aventura',
            'description' => 'Explora el mundo de Hyrule en The Legend of Zelda: A Link Between Worlds.',
            'image' => 'zelda_link_between_worlds.jpg',
            'slider' => 0,
        ]);

        Game::create([
            'title' => 'Super Mario 3D Land',
            'developer' => 'Nintendo EAD',
            'releasedate' => '2011-11-13',
            'category_id' => 5,
            'user_id' => 1,
            'price' => 39.99,
            'genre' => 'Plataformas',
            'description' => 'Únete a Mario en una nueva aventura en 3D en Super Mario 3D Land.',
            'image' => 'mario_3d_land.jpg',
            'slider' => 0,
        ]);

        // Creación de juegos ficticios para Wii U categoria 6
        Game::create([
            'title' => 'Super Smash Bros. for Wii U',
            'developer' => 'Bandai Namco Studios',
            'releasedate' => '2014-11-21',
            'category_id' => 6,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Lucha',
            'description' => 'Lucha con tus personajes favoritos de Nintendo en Super Smash Bros. for Wii U.',
            'image' => 'smash_bros.jpg',
            'slider' => 0,
        ]);

        Game::create([
            'title' => 'Mario Kart 8',
            'developer' => 'Nintendo EAD',
            'releasedate' => '2014-05-30',
            'category_id' => 6,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Carreras',
            'description' => 'Compite en emocionantes carreras en Mario Kart 8.',
            'image' => 'mario_kart_8.jpg',
            'slider' => 0,
        ]);

        Game::create([
            'title' => 'Splatoon',
            'developer' => 'Nintendo EAD',
            'releasedate' => '2015-05-29',
            'category_id' => 6,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Shooter',
            'description' => 'Participa en emocionantes batallas de tinta en Splatoon.',
            'image' => 'splatoon.jpg',
            'slider' => 0,
        ]);

        // Creación de juegos ficticios para Play Station 5 categoria 7
        Game::create([
            'title' => 'Spider-Man: Miles Morales',
            'developer' => 'Insomniac Games',
            'releasedate' => '2020-11-12',
            'category_id' => 7,
            'user_id' => 1,
            'price' => 69.99,
            'genre' => 'Acción y aventura',
            'description' => '¡Embárcate en una nueva aventura como Miles Morales en la ciudad de Nueva York!',
            'image' => 'spiderman.jpg',
            'slider' => 1,
        ]);

        Game::create([
            'title' => 'Demon\'s Souls',
            'developer' => 'Bluepoint Games',
            'releasedate' => '2020-11-12',
            'category_id' => 7,
            'user_id' => 1,
            'price' => 69.99,
            'genre' => 'RPG',
            'description' => 'Revive el clásico juego de rol de acción en la PlayStation 5 con Demon\'s Souls.',
            'image' => 'demons_souls.jpg',
            'slider' => 0,
        ]);

        Game::create([
            'title' => 'Ratchet & Clank: Rift Apart',
            'developer' => 'Insomniac Games',
            'releasedate' => '2021-06-11',
            'category_id' => 7,
            'user_id' => 1,
            'price' => 69.99,
            'genre' => 'Acción y aventura',
            'description' => 'Únete a Ratchet y Clank en una nueva aventura interdimensional en Rift Apart.',
            'image' => 'ratchet_clank.jpg',
            'slider' => 0,
        ]);

        // Creación de juegos ficticios para Play Station 4 categoria 8
        Game::create([
            'title' => 'The Last of Us Part II',
            'developer' => 'Naughty Dog',
            'releasedate' => '2020-06-19',
            'category_id' => 8,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Acción y aventura',
            'description' => 'Continúa la historia de Ellie en The Last of Us Part II.',
            'image' => 'last_of_us_2.jpg',
            'slider' => 0,
        ]);

        Game::create([
            'title' => 'God of War',
            'developer' => 'Santa Monica Studio',
            'releasedate' => '2018-04-20',
            'category_id' => 8,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Acción y aventura',
            'description' => 'Únete a Kratos y Atreus en una épica aventura en God of War.',
            'image' => 'god_of_war.jpg',
            'slider' => 1,
            
        ]);

        Game::create([
            'title' => 'Uncharted 4: A Thief\'s End',
            'developer' => 'Naughty Dog',
            'releasedate' => '2016-05-10',
            'category_id' => 8,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Acción y aventura',
            'description' => 'Acompaña a Nathan Drake en su última aventura en Uncharted 4: A Thief\'s End.',
            'image' => 'uncharted_4.jpg',
            'slider' => 0,
        ]);

        // Creación de juegos ficticios para Play Station 3 categoria 9
        Game::create([
            'title' => 'The Last of Us',
            'developer' => 'Naughty Dog',
            'releasedate' => '2013-06-14',
            'category_id' => 9,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Acción y aventura',
            'description' => 'Sobrevive en un mundo post-apocalíptico en The Last of Us.',
            'image' => 'last_of_us.jpg',
            'slider' => 0,
        ]);

        Game::create([
            'title' => 'Red Dead Redemption',
            'developer' => 'Rockstar San Diego',
            'releasedate' => '2010-05-18',
            'category_id' => 9,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Acción y aventura',
            'description' => 'Explora el Salvaje Oeste en Red Dead Redemption.',
            'image' => 'red_dead_redemption.jpg',
            'slider' => 0,
        ]);

        Game::create([
            'title' => 'Grand Theft Auto V',
            'developer' => 'Rockstar North',
            'releasedate' => '2013-09-17',
            'category_id' => 9,
            'user_id' => 1,
            'price' => 59.99,
            'genre' => 'Acción y aventura',
            'description' => 'Vive la vida criminal en Los Santos en Grand Theft Auto V.',
            'image' => 'gta_v.jpg',
            'slider' => 0,
        ]);
    }
}