<?php

namespace App\Actions\Projects;

use App\Models\Project;
use Illuminate\Support\Str;

class BuildProjectShowData
{
    public function __invoke(Project $project): array
    {
        $locale = app()->getLocale();

        return [
            'id' => $project->id,

            'header' => $project->getTranslation('header', $locale),

            'description' => $project->getTranslation('description', $locale),

            'details' => Str::markdown(
                $project->getTranslation('details', $locale)
            ),

            'logo_url' => $project->getFirstMediaUrl('logo'),

            'gallery' => $project
                ->getMedia('images')
                ->map(fn($media) => [
                    'url' => $media->getUrl(),
                ])
                ->values(),

            'type_label' => $project->type?->label(),

            'role_labels' => $project
                ->roles()
                ->map(fn($role) => $role->label())
                ->values(),

            'tech_tags' => $project->techTags()
                ->pluck('name')
                ->values(),

            'is_package' => $project->isPackage(),

            'is_in_progress' => (bool) $project->is_in_progress,

            'start' => $project->start?->format('M Y'),

            'end' => $project->end?->format('M Y'),

            'link' => $project->link,

            'company' => [
                'name' => $project->company?->name,
                'industry' => $project->company?->industry,
                'size' => $project->company?->size,
                'headquarter' => $project->company?->headquarter,
                'website' => $project->company?->website,
            ],

            'testimonials' => $project->testimonials
                ->map(fn($testimonial) => [
                    'id' => $testimonial->id,
                    'author' => $testimonial->author,
                    'position' => $testimonial->position,
                    'content' => $testimonial->content,
                ])
                ->values(),

            'project_url' => route('projects.show', [
                'locale' => $locale,
                'project' => $project,
            ]),
        ];
    }
}
