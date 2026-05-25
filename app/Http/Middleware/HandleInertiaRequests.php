<?php

namespace App\Http\Middleware;

use App\Support\Cms;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        return [
            ...parent::share($request),

            'locale' => app()->getLocale(),
            'languageTag' => str_replace('_', '-', app()->getLocale()),
            'direction' => app()->isLocale('ar') ? 'rtl' : 'ltr',
            'locales' => $this->getLocales($request),

            'cms' => [
                'header' => Cms::section('global', 'header', [
                    'cta_label' => __('ui.actions.book_call'),
                ]),
                'hero' => Cms::section('home', 'hero', [
                    'kicker' => 'Helping businesses',
                    'title' => 'build scalable digital products',
                    'description' => 'Full-stack web developer focused on building scalable platforms and complex digital products. I specialize in backend architecture, APIs, and designing systems that handle real-world business logic efficiently.',
                    'cta_label' => __('ui.actions.book_call'),
                ]),

                'footer' => Cms::section('global', 'footer', [
                    'title' => 'Lets make something great together',
                    'description' => 'I’m always excited to collaborate on innovative projects or discuss potential opportunities. Feel free to reach out!',
                    'button_label' => __('ui.actions.book_call'),
                    'copyright' => '© 2024, All Rights Reserved',
                ]),

                'socials' => Cms::section('global', 'socials', [
                    'items' => [
                        [
                            'name' => 'Github',
                            'link' => 'https://github.com/KaziSTM',
                            'icon' => 'github-logo',
                        ],
                        [
                            'name' => 'Linkedin',
                            'link' => 'https://linkedin.com/in/youcef-nezrek-7685a61a6',
                            'icon' => 'linkedin-logo',
                        ],
                        [
                            'name' => 'Instagram',
                            'link' => 'https://www.instagram.com/that_mofo_kaz/',
                            'icon' => 'instagram-logo',
                        ],
                    ],
                ])['items'],
            ],

            'navigation' => $this->getNavigation(),

            'footerNavigation' => $this->getFooterNavigation(),
        ];
    }

    protected function getLocales(Request $request): array
    {
        $route = $request->route();
        $routeName = $route?->getName();
        $parameters = $route?->parameters() ?? [];

        unset($parameters['locale']);

        return collect(config('app.supported_locales', ['en']))
            ->map(fn(string $locale) => [
                'key' => $locale,
                'label' => strtoupper($locale),

                'url' => $routeName
                    ? route($routeName, [
                        'locale' => $locale,
                        ...$parameters,
                    ])
                    : url($locale),

            ])
            ->values()
            ->all();
    }

    protected function getNavigation(): array
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

    protected function getFooterNavigation(): array
    {
        return [
            ...$this->getNavigation(),

            [
                'label' => __('ui.navigation.contact'),
                'route' => route('contact', [
                    'locale' => app()->getLocale(),
                ]),
            ],
        ];
    }
}
