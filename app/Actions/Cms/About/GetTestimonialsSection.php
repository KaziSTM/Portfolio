<?php

namespace App\Actions\Cms\About;

use App\Models\Testimonial;
use App\Support\Cms;
use Illuminate\Database\Eloquent\Collection;

class GetTestimonialsSection
{
    public function __invoke(): array
    {
        return [
            'header' => $this->buildHeader(),
            'content' => $this->buildTestimonials(),
        ];
    }

    private function buildHeader(): array
    {
        return Cms::section('about', 'testimonials', [
            'title' => 'Testimonials',
            'paragraphs' => [],
        ]);
    }

    private function buildTestimonials(): array
    {
        return $this->getTestimonials()
            ->map(fn(Testimonial $testimonial) => [
                'id' => $testimonial->id,
                'author' => $testimonial->author_name,
                'role' => $testimonial->author_role,
                'content' => $testimonial->content,
                'rating' => $testimonial->rating,
                'avatar' => $testimonial->avatar,
            ])
            ->toArray();
    }

    private function getTestimonials(): Collection|array
    {
        return Testimonial::query()
            ->whereNull('project_id')
            ->latest()
            ->get();
    }
}
