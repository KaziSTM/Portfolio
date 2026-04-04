<?php

use TallStackUi\Components;

return [
    'prefix' => env('TALLSTACKUI_PREFIX'),

    'color_classes_namespace' => env('TALLSTACKUI_COLOR_CLASSES_NAMESPACE', 'App\\View\\Components\\TallStackUi\\Colors'),

    'invalidate_global' => false,

    'debug' => [
        'status' => env('TALLSTACKUI_DEBUG_MODE', false),
        'environments' => [
            'local',
            'sandbox',
            'staging',
        ],
        'ignore' => [],
    ],

    'components' => [
        'button' => Components\Button\Normal\Component::class,
        'button.circle' => Components\Button\Circle\Component::class,
        'icon' => [
            Components\Icon\Component::class,
            [
                // Use local Blade SVG components so the existing phosphor-style icon names continue to work.
                'type' => env('TALLSTACKUI_ICON_TYPE', 'icons'),
                'style' => env('TALLSTACKUI_ICON_STYLE', 'solid'),
            ],
        ],
    ],
];
