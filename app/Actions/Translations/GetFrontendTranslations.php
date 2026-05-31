<?php

namespace App\Actions\Translations;

class GetFrontendTranslations
{
    public function __invoke(): array
    {
        return [
            'header_cta_label' => __('ui.actions.book_call'),

            'hero_cta_label' => __('ui.actions.book_call'),

            'features' => [
                'caption' => __('ui.home.features_caption'),
                'download_label' => __('ui.actions.download_cv'),
                'view_experience_label' => __('ui.actions.view_experience'),
            ],

            'projects' => [
                'title' => __('ui.pages.work'),
                'all' => __('ui.projects.all'),
                'prev' => __('ui.pagination.previous'),
                'next' => __('ui.pagination.next'),
                'present' => __('ui.projects.present'),
                'in_progress' => __('ui.projects.in_progress'),
            ],

            'actions' => [
                'view_package' => __('ui.actions.view_package'),
                'view_case_study' => __('ui.actions.view_case_study'),
            ],

            'tools_section_caption' => __('ui.home.tools_caption'),
        ];
    }
}
