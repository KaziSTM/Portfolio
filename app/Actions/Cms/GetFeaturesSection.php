<?php

namespace App\Actions\Cms;

use App\Support\Cms;

class GetFeaturesSection
{
    public function __invoke(): array
    {
        return [
            'features' => Cms::section('home', 'features', [
                'title' => 'How I build reliable systems',
                'description' => 'I focus on delivering reliable, scalable solutions with a strong emphasis on backend architecture, performance, and clean implementation of complex business logic.',
                'items' => [],
            ]),
        ];
    }
}
