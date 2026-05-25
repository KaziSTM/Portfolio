<?php

namespace App\Actions\Navigation;

class GetMainNavigation
{
    public function __invoke(): array
    {
        return [
            [
                'label' => __('ui.navigation.home'),
                'route' => route('home', [
                    'locale' => app()->getLocale(),
                ]),
            ],

            [
                'label' => __('ui.navigation.about'),
                'route' => route('about', [
                    'locale' => app()->getLocale(),
                ]),
            ],

            [
                'label' => __('ui.navigation.work'),
                'route' => route('work', [
                    'locale' => app()->getLocale(),
                ]),
            ],
        ];
    }
}
