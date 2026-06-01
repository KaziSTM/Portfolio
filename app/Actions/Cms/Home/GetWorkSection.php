<?php

namespace App\Actions\Cms\Home;

use App\Actions\Projects\BuildProjectCardData;
use App\Models\Project;
use App\Support\Cms;

class GetWorkSection
{
    public function __construct(
        protected BuildProjectCardData $buildProjectCardData,
    ) {
    }

    public function __invoke(): array
    {
        return [
            'content' => Cms::section('home', 'work', [
                'title' => 'Check out my latest work',
                'description' => 'Discover how I craft scalable and impactful digital systems.',
            ]),

            'latest_projects' => Project::query()
                ->featured()
                ->latest()
                ->limit(4)
                ->get()
                ->map(
                    fn(Project $project) => ($this->buildProjectCardData)($project)
                )
                ->values()
                ->all(),
        ];
    }
}
