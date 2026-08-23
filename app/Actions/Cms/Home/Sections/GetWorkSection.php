<?php

namespace App\Actions\Cms\Home\Sections;

use App\Http\Resources\Projects\ProjectsListingResource;
use App\Models\Project;
use App\Support\Cms;

class GetWorkSection
{
    public function __construct() {}

    public function __invoke(): array
    {
        return [
            'content' => Cms::section('home', 'work', [
                'title' => 'Check out my latest work',
                'description' => 'Discover how I craft scalable and impactful digital systems.',
            ]),

            'latest_projects' => ProjectsListingResource::Collection($this->getProjects()),
            'translations' => [

                'view_package' => __('ui.actions.view_package'),
                'view_case_study' => __('ui.actions.view_case_study'),
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function getProjects()
    {
        return Project::query()
            ->with('tags', 'media')
            ->featured()
            ->ordered()
            ->limit(4)
            ->get();
    }
}
