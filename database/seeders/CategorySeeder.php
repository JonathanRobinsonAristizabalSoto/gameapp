<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creación de categorías ficticias

        // Categorías de Microsoft 
        //categoría 1
        Category::create([
            'name' => 'Xbox Series X',
            'manufacturer' => 'Microsoft',
            'releasedate' => '2020-11-10',
            'description' => 'La Xbox Series X es la consola más potente de Microsoft, lanzada en 2020.',
            'image' => 'XboxSeriesX.png',
        ]);
        //categoría 2
        Category::create([
            'name' => 'Xbox One',
            'manufacturer' => 'Microsoft',
            'releasedate' => '2013-11-22',
            'description' => 'La Xbox One es una consola de videojuegos de octava generación desarrollada por Microsoft.',
            'image' => 'XboxOne.png',
        ]);
        //categoría 3
        Category::create([
            'name' => 'Xbox 360',
            'manufacturer' => 'Microsoft',
            'releasedate' => '2005-11-22',
            'description' => 'La Xbox 360 es una consola de videojuegos desarrollada por Microsoft, lanzada en 2005.',
            'image' => 'Xbox360.png',
        ]);

        // Categorías de Nintendo
        //categoría 4
        Category::create([
            'name' => 'Nintendo Switch',
            'manufacturer' => 'Nintendo',
            'releasedate' => '2017-03-03',
            'description' => 'La Nintendo Switch es una consola híbrida que se puede usar como consola de sobremesa y portátil.',
            'image' => 'Switch.png',
        ]);
        //categoría 5
        Category::create([
            'name' => 'Nintendo 3DS',
            'manufacturer' => 'Nintendo',
            'releasedate' => '2011-02-26',
            'description' => 'La Nintendo 3DS es una consola portátil que permite ver imágenes en 3D sin gafas especiales.',
            'image' => '3DS.png',
        ]);
        //categoría 6
        Category::create([
            'name' => 'Wii U',
            'manufacturer' => 'Nintendo',
            'releasedate' => '2012-11-18',
            'description' => 'La Wii U es una consola de videojuegos desarrollada por Nintendo, sucesora de la Wii.',
            'image' => 'WiiU.png',
        ]);

        // Categorías de Sony
        //categoría 7
        Category::create([
            'name' => 'Play Station 5',
            'manufacturer' => 'Sony',
            'releasedate' => '2020-11-12',
            'description' => 'La PlayStation 5 es la consola de videojuegos de novena generación de Sony, lanzada en 2020.',
            'image' => 'Ps5.png',
        ]);
        //categoría 8
        Category::create([
            'name' => 'Play Station 4',
            'manufacturer' => 'Sony',
            'releasedate' => '2013-11-15',
            'description' => 'La PlayStation 4 es una consola de videojuegos de octava generación desarrollada por Sony.',
            'image' => 'Ps4.png',
        ]);
        //categoría 9
        Category::create([
            'name' => 'Play Station 3',
            'manufacturer' => 'Sony',
            'releasedate' => '2006-11-11',
            'description' => 'La PlayStation 3 es una consola de videojuegos de séptima generación desarrollada por Sony.',
            'image' => 'Ps3.png',
        ]);
    }
}