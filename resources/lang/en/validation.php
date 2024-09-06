<?php
// resources/lang/en/validation.php
return [
    // ...
    'custom' => [
        'email' => [
            'required' => 'The email field is required.',
            'email' => 'The email must be a valid email address.',
        ],
        'password' => [
            'required' => 'The password field is required.',
            'min' => 'The password must be at least :min characters.',
        ],
    ],
    // ...
];
