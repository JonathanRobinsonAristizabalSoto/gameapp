<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Verifica que todos los campos necesarios estén presentes en el archivo de Excel
        if (!isset($row['name'], $row['manufacturer'], $row['releasedate'], $row['description'])) {
            return null;
        }

        // Busca el registro existente por nombre
        $category = Category::where('name', $row['name'])->first();

        if ($category) {
            // Actualiza el registro existente
            $category->update([
                'image' => $row['image'] ?? $category->image,
                'manufacturer' => $row['manufacturer'],
                'releasedate' => $row['releasedate'],
                'description' => $row['description'],
            ]);
            return $category;
        } else {
            // Crea un nuevo registro si no existe
            return new Category([
                'name' => $row['name'],
                'image' => $row['image'] ?? null, // Maneja el caso en que la imagen sea opcional
                'manufacturer' => $row['manufacturer'],
                'releasedate' => $row['releasedate'],
                'description' => $row['description'],
            ]);
        }
    }
}