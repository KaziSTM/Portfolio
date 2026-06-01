<?php

return [
    'validation' => [
        'name' => [
            'required' => 'Please enter your name.',
            'min' => 'Your name must contain at least :min characters.',
        ],

        'email' => [
            'required' => 'Please enter your email address.',
            'email' => 'Please provide a valid email address.',
        ],

        'phone' => [
            'regex' => 'Please provide a valid phone number.',
        ],

        'message' => [
            'required' => 'Please enter a message.',
            'min' => 'Your message must contain at least :min characters.',
        ],
    ],
];
