<?php

namespace App\Actions\Translations;

class GetProjectPageTranslations
{
    public function __invoke(): array
    {
        return [

            'filters' => [
                'all' => __('ui.filters.all'),
                'company_projects' => __('ui.filters.company_projects'),
                'personal_projects' => __('ui.filters.personal_projects'),
                'packages' => __('ui.filters.packages'),
            ],

            'projects' => [
                'all' => __('ui.filters.all'),
                'in_progress' => __('ui.projects.in_progress'),
                'ongoing' => __('ui.projects.ongoing'),
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

            'view_package' => __('ui.actions.view_package'),
            'view_case_study' => __('ui.actions.view_case_study'),
            'actions' => [
                'visit_project' => __('ui.actions.visit_project'),
                'prev' => __('ui.actions.prev'),
                'next' => __('ui.actions.next'),
            ],

        ];
    }
}
