<?php
// resources/lang/es/validation.php
return [
    // ...
    'custom' => [
        'email' => [
            'required' => 'El campo de correo electrónico es obligatorio.',
            'email' => 'El correo electrónico debe ser una dirección válida.',
        ],
        'password' => [
            'required' => 'El campo de la contraseña es obligatorio.',
            'min' => 'La contraseña debe tener al menos :min caracteres.',
        ],
    ],
    // ...
];
