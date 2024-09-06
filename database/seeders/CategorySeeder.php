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
        Category::create([
            'name' => 'Xbox Series X',
            'manufacturer' => 'Microsoft',
            'releasedate' => '2020-11-10',
            'description' => 'Lorem ipsum dolor sit amet',
            'image' => 'XboxSeriesX.png',
        ]);

        Category::create([
            'name' => 'Nintendo Switch',
            'manufacturer' => 'Nintendo',
            'releasedate' => '2017-11-10',
            'description' => 'Lorem ipsum dolor sit amet',
            'image' => 'Switch.png',
        ]);

        Category::create([
            'name' => 'Play Station 5',
            'manufacturer' => 'Sony',
            'releasedate' => '2020-11-12',
            'description' => 'Lorem ipsum dolor sit amet',
            'image' => 'Ps5.png',
        ]);
    }
}
