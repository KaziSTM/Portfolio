<?php

namespace App\Http\Resources\Projects;

use App\Models\Project;
use App\Trait\GetProjectRoles;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Project */
class ProjectsListingResource extends JsonResource
{
    use GetProjectRoles;

    public function toArray(Request $request): array
    {
        $locale = app()->getLocale();

        return [
            'id' => $this->id,

            'header' => $this->getTranslation('header', $locale),

            'description' => $this->getTranslation('description', $locale),

            'details' => $this->getTranslation('details', $locale),

            'logo_url' => $this->getFirstMediaUrl('logo'),

            'type_label' => $this->type?->label(),

            'role_labels' => $this->whenLoaded('tags', $this->getRoles()),

            'is_in_progress' => (bool) $this->is_in_progress,

            'start' => $this->start?->translatedFormat('M Y'),

            'end' => $this->end?->translatedFormat('M Y'),

            'is_package' => $this->isPackage(),

            'project_url' => route('projects.show', [
                'locale' => $locale,
                'project' => $this,
            ]),
            'tech_tags' => $this->techTags()->take(4),
        ];
    }
}
