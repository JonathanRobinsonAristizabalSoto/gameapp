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
        return Game::all(['title', 'image', 'developer', 'releasedate', 'category_id', 'user_id', 'price', 'genre', 'slider', 'description']);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'title',
            'image',
            'developer',
            'releasedate',
            'category_id',
            'user_id',
            'price',
            'genre',
            'slider',
            'description',
        ];
    }
}