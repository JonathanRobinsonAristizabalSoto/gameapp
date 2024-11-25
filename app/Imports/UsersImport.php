<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Validators\ValidationException;

class UsersImport implements ToModel, WithHeadingRow
{
    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Verifica que todos los campos necesarios estén presentes en el archivo de Excel
        if (!isset($row['document'], $row['fullname'], $row['gender'], $row['birthdate'], $row['phone'], $row['email'], $row['role'], $row['status'])) {
            return null;
        }

        // Busca el registro existente por documento y correo electrónico
        $user = User::where('document', $row['document'])->where('email', $row['email'])->first();

        if ($user) {
            // Actualiza el registro existente
            $user->update([
                'fullname' => $row['fullname'],
                'gender' => $row['gender'],
                'birthdate' => $row['birthdate'],
                'photo' => $row['photo'] ?? $user->photo,
                'phone' => $row['phone'],
                'email' => $row['email'],
                'role' => $row['role'],
                'status' => $row['status'],
            ]);
            return $user;
        } else {
            // Verifica si el documento ya existe
            $existingDocument = User::where('document', $row['document'])->first();
            if ($existingDocument) {
                throw ValidationException::withMessages([
                    'document' => "El documento {$row['document']} ya está registrado con un correo diferente.",
                ]);
            }

            // Verifica si el correo electrónico ya existe
            $existingEmail = User::where('email', $row['email'])->first();
            if ($existingEmail) {
                throw ValidationException::withMessages([
                    'email' => "El correo electrónico {$row['email']} ya está registrado con un documento diferente.",
                ]);
            }

            // Crea un nuevo registro si no existe
            return new User([
                'document' => $row['document'],
                'fullname' => $row['fullname'],
                'gender' => $row['gender'],
                'birthdate' => $row['birthdate'],
                'photo' => $row['photo'] ?? null, // Maneja el caso en que la foto sea opcional
                'phone' => $row['phone'],
                'email' => $row['email'],
                'role' => $row['role'],
                'status' => $row['status'],
                'password' => Hash::make('defaultpassword'), // Puedes cambiar esto según tus necesidades
            ]);
        }
    }
}