<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoriesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Category::all(['name', 'image', 'manufacturer', 'releasedate', 'description']);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Name',
            'Image',
            'Manufacturer',
            'Release Date',
            'Description',
        ];
    }
}