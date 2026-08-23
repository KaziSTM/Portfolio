<?php

namespace App\Http\Resources\Projects;

use App\Models\Project;
use App\Trait\GetProjectRoles;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/** @mixin Project */
class ProjectShowResource extends JsonResource
{
    use GetProjectRoles;

    public function toArray(Request $request): array
    {
        $locale = app()->getLocale();

        return [
            'id' => $this->id,

            'header' => $this->getTranslation('header', $locale),

            'description' => $this->getTranslation('description', $locale),

            'details' => Str::markdown(
                $this->getTranslation('details', $locale)
            ),

            'logo_url' => $this->getFirstMediaUrl('logo'),

            'gallery' => $this
                ->getMedia('images')
                ->map(fn ($media) => [
                    'url' => $media->getUrl(),
                ])
                ->values(),

            'type_label' => $this->type?->label(),

            'role_labels' => $this->whenLoaded('tags', $this->getRoles()),

            'tech_tags' => $this->whenLoaded('tags', $this->getTechTags()),

            'is_package' => $this->isPackage(),

            'is_in_progress' => (bool) $this->is_in_progress,

            'start' => $this->start?->translatedFormat('M Y'),

            'end' => $this->end?->translatedFormat('M Y'),

            'link' => $this->link,

            'company' => $this->whenLoaded('company', CompanyPreviewResource::make($this->company)),

            'testimonials' => $this->whenLoaded('testimonials', TestimonialResource::collection($this->testimonials)),

            'project_url' => route('projects.show', [
                'locale' => $locale,
                'project' => $this,
            ]),
        ];
    }
}
