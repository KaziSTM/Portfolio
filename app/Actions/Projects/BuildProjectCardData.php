<?php

namespace App\Actions\Projects;

use App\Models\Project;

class BuildProjectCardData
{
    public function __invoke(Project $project): array
    {
        $locale = app()->getLocale();

        return [
            'id' => $project->id,

            'header' => $project->getTranslation('header', $locale),

            'description' => $project->getTranslation('description', $locale),

            'details' => $project->getTranslation('details', $locale),

            'logo_url' => $project->getFirstMediaUrl('logo'),

            'type_label' => $project->type?->label(),

            'role_labels' => $project->roles()
                ->map(fn($role) => $role->label())
                ->values()
                ->all(),

            'is_in_progress' => (bool) $project->is_in_progress,

            'start' => $project->start?->translatedFormat('M Y'),

            'end' => $project->end?->translatedFormat('M Y'),

            'is_package' => $project->isPackage(),

            'project_url' => route('projects.show', [
                'locale' => $locale,
                'project' => $project,
            ]),
            'tech_tags' => $project->techTags()->take(4)
        ];
    }
}
