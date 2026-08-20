<?php

namespace App\Actions\Cms\About\Sections;

use App\Support\Cms;

class GetStackSection
{
    public function __invoke(): array
    {
        return [
            'tools' => $this->getTools(),
            'content' => $this->getStackContent(),
        ];
    }

    private function getTools(): array
    {
        return [
            [
                'src' => '/assets/svg/icons/php.svg',
                'alt' => 'PHP',
            ],
            [
                'src' => '/assets/svg/icons/mysql.svg',
                'alt' => 'Mysql',
            ],
            [
                'src' => '/assets/svg/icons/tailwindcss.svg',
                'alt' => 'Tailwind Css',
            ],
            [
                'src' => '/assets/svg/icons/alpinejs.svg',
                'alt' => 'AlpineJs',
            ],
            [
                'src' => '/assets/svg/icons/laravel.svg',
                'alt' => 'Laravel',
            ],

            [
                'src' => '/assets/svg/icons/livewire.svg',
                'alt' => 'Livewire',
            ],
            [
                'src' => '/assets/svg/icons/javascript.svg',
                'alt' => 'Javascript',
            ],
            [
                'src' => '/assets/svg/icons/vue.svg',
                'alt' => 'VueJs',
            ],
        ];
    }

    public function getStackContent(): array
    {
        $locale = app()->getLocale();

        return Cms::section('about', 'stack', [
            'title' => 'A stack built for reliability and scale',
            'description' => 'I focus on a carefully chosen set of technologies that allow me to build fast, maintainable, and scalable systems. Instead of chasing trends, I prioritize tools that integrate well together and support clean architecture, efficient workflows, and long-term stability. This stack enables me to deliver robust applications, from complex backends to responsive user interfaces.',
        ]);
    }
}
