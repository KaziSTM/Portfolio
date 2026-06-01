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
                'all' => __('ui.projects.all'),
                'in_progress' => __('ui.projects.in_progress'),
                'present' => __('ui.projects.present'),
                'client' => __('ui.projects.client'),
                'industry' => __('ui.projects.industry'),
                'company_size' => __('ui.projects.company_size'),
                'headquarters' => __('ui.projects.headquarters'),
                'duration' => __('ui.projects.duration'),
                'website' => __('ui.projects.website'),
                'personal_project' => __('ui.projects.personal_project'),
                'testimonials_title' => __('ui.projects.testimonials_title'),
                'visit_project' => __('ui.projects.visit_project'),
            ],

            'contact' => [
                'fields' => [
                    'name' => __('ui.contact.fields.name'),
                    'email' => __('ui.contact.fields.email'),
                    'phone' => __('ui.contact.fields.phone'),
                    'message' => __('ui.contact.fields.message'),
                    'services' => __('ui.contact.fields.services'),
                ],

                'placeholders' => [
                    'name' => __('ui.contact.placeholders.name'),
                    'email' => __('ui.contact.placeholders.email'),
                    'phone' => __('ui.contact.placeholders.phone'),
                    'message' => __('ui.contact.placeholders.message'),
                ],
            ],

            'actions' => [
                'view_package' => __('ui.actions.view_package'),
                'view_case_study' => __('ui.actions.view_case_study'),
                'visit_project' => __('ui.actions.visit_project'),
                'prev' => __('ui.actions.prev'),
                'next' => __('ui.actions.next'),
            ],
            'pages' => [
                'home' => __('ui.pages.home'),
                'about' => __('ui.pages.about'),
                'contact' => __('ui.pages.contact'),
                'work' => __('ui.pages.work'),
                'project' => __('ui.pages.project'),
            ],


            'tools_section_caption' => __('ui.home.tools_caption'),
        ];
    }
}
