<?php

namespace App\Exports;

use App\Models\Game;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GamesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Game::all(['title', 'developer', 'releasedate', 'category_id', 'price', 'genre', 'description']);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Título',
            'Desarrollador',
            'Fecha de Lanzamiento',
            'Categoría',
            'Precio',
            'Género',
            'Descripción',
        ];
    }
}