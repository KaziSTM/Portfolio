<?php

namespace App\Actions\Navigation;

class GetFooterNavigation
{
    public function __construct(
        protected GetMainNavigation $getMainNavigation,
    ) {
    }

    public function __invoke(): array
    {
        return [
            ...($this->getMainNavigation)(),

            [
                'label' => __('ui.navigation.contact'),
                'route' => route('contact', [
                    'locale' => app()->getLocale(),
                ]),
            ],
        ];
    }
}
