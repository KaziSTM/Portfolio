<?php

namespace App\Actions\Cms\Home\Sections;

use App\Support\Cms;

class GetFeaturesSection
{
    public function __invoke(): array
    {
        return [
            'caption' => __('ui.home.features_caption'),
            'download_label' => __('ui.actions.download_cv'),
            'view_experience_label' => __('ui.actions.view_experience'),
            'features' => Cms::section('home', 'features', [
                'title' => 'How I build reliable systems',
                'description' => 'I focus on delivering reliable, scalable solutions with a strong emphasis on backend architecture, performance, and clean implementation of complex business logic.',
                'items' => [],
            ]),
        ];
    }
}
