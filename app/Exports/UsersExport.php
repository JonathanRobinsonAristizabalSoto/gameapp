<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all(['id', 'document', 'fullname', 'gender', 'birthdate', 'photo', 'phone', 'email', 'role', 'status']);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Document',
            'Fullname',
            'Gender',
            'Birthdate',
            'Photo',
            'Phone',
            'Email',
            'Role',
            'Status',
        ];
    }
}