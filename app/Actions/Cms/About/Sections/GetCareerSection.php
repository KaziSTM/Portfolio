<?php

namespace App\Actions\Cms\About\Sections;

use App\Http\Resources\About\CareerPreviewResource;
use App\Models\Career;
use App\Support\Cms;
use Illuminate\Database\Eloquent\Collection;

class GetCareerSection
{
    public function __invoke(): array
    {
        return [
            'jobs' => CareerPreviewResource::collection($this->getCareers()),
            'content' => $this->getCareerSectionContent(),
            'download_label' => __('ui.actions.download_cv'),
        ];
    }

    private function getCareers(): Collection|array
    {
        return Career::query()
            ->with('company.media')
            ->orderBy('position')
            ->get();
    }

    public function getCareerSectionContent(): array
    {
        $locale = app()->getLocale();

        return Cms::section('about', 'career', [
            'title' => 'My career journey so far',
            'description' => 'My journey in web development started with a strong interest in building meaningful digital products and has evolved into designing and developing complex, scalable systems. I’ve worked on a wide range of applications, including e-commerce platforms, ERP solutions, and multi-tenant architectures, focusing on backend systems, APIs, and business-critical workflows. Each experience has strengthened my ability to deliver reliable, maintainable solutions that align with real-world operational needs.',
            'cv_label' => __('ui.actions.download_cv'),
        ]);
    }
}
