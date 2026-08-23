<?php

namespace App\Http\Controllers\Pages\Projects;

use App\Actions\Translations\GetProjectPageTranslations;
use App\Http\Controllers\Controller;
use App\Http\Resources\Projects\ProjectsListingResource;
use App\Models\Project;
use App\Support\Cms;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectsListController extends Controller
{
    public function __invoke(
        Request $request,
        GetProjectPageTranslations $getProjectPageTranslations,
    ) {
        $filter = $request->string('filter')->toString() ?: $request->string('role')->toString();

        $projects = Project::query()
            ->with('tags', 'media', 'company')
            ->when($filter === 'company_projects', fn ($query) => $query->companyProjects())
            ->when($filter === 'freelance_projects' || $filter === 'personal_projects', fn ($query) => $query->freelanceProjects())
            ->when($filter === 'packages', fn ($query) => $query->packages())
            ->active()
            ->ordered()
            ->paginate(6)
            ->withQueryString();

        $filters = [
            [
                'value' => 'company_projects',
                'label' => __('ui.filters.company_projects'),
            ],
            [
                'value' => 'freelance_projects',
                'label' => __('ui.filters.freelance_projects'),
            ],
            [
                'value' => 'packages',
                'label' => __('ui.filters.packages'),
            ],
        ];

        return Inertia::render('Projects/IndexView', [
            'pageHeader' => Cms::section('projects', 'header', [
                'title' => 'Case Studies',
                'description' => 'Dive into my diverse range of projects, showcasing my expertise in software development, design, and dedication to delivering exceptional results.',
            ]),

            'selectedFilter' => $filter,
            'filters' => $filters,

            // Kept for backward compatibility
            'selectedRole' => $filter,
            'roles' => $filters,

            'projects' => ProjectsListingResource::collection($projects),
            'translations' => $getProjectPageTranslations(),
        ]);
    }
}
