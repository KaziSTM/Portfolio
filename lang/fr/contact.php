<?php

return [
    'validation' => [
        'name' => [
            'required' => 'Veuillez saisir votre nom.',
            'min' => 'Votre nom doit contenir au moins :min caractères.',
        ],

        'email' => [
            'required' => 'Veuillez saisir votre adresse e-mail.',
            'email' => 'Veuillez fournir une adresse e-mail valide.',
        ],

        'phone' => [
            'regex' => 'Veuillez fournir un numéro de téléphone valide.',
        ],

        'message' => [
            'required' => 'Veuillez saisir un message.',
            'min' => 'Votre message doit contenir au moins :min caractères.',
        ],
    ],
];
