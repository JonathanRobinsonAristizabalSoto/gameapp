<?php

namespace App\Imports;

use App\Models\Game;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GamesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Verifica que todos los campos necesarios estén presentes en el archivo de Excel
        if (!isset($row['title'], $row['developer'], $row['releasedate'], $row['category_id'], $row['user_id'], $row['price'], $row['genre'], $row['slider'], $row['description'])) {
            return null;
        }

        // Busca el registro existente por título
        $game = Game::where('title', $row['title'])->first();

        if ($game) {
            // Actualiza el registro existente
            $game->update([
                'image' => $row['image'] ?? $game->image,
                'developer' => $row['developer'],
                'releasedate' => $row['releasedate'],
                'category_id' => $row['category_id'],
                'user_id' => $row['user_id'],
                'price' => $row['price'],
                'genre' => $row['genre'],
                'slider' => $row['slider'],
                'description' => $row['description'],
            ]);
            return $game;
        } else {
            // Crea un nuevo registro si no existe
            return new Game([
                'title' => $row['title'],
                'image' => $row['image'] ?? null, // Maneja el caso en que la imagen sea opcional
                'developer' => $row['developer'],
                'releasedate' => $row['releasedate'],
                'category_id' => $row['category_id'],
                'user_id' => $row['user_id'],
                'price' => $row['price'],
                'genre' => $row['genre'],
                'slider' => $row['slider'],
                'description' => $row['description'],
            ]);
        }
    }
}