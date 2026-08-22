<?php

namespace App\Http\Controllers\Pages\Projects;

use App\Actions\Translations\GetProjectPageTranslations;
use App\Enums\ProjectRole;
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
        $role = $request->string('role')->toString();

        $projects = Project::query()
            ->with('tags', 'media')
            ->when(
                $role,
                fn ($query) => $query->withAnyTags([$role], 'main')
            )
            ->active()
            ->latest()
            ->paginate(6);

        return Inertia::render('Projects/IndexView', [
            'header' => Cms::section('projects', 'header', [
                'title' => 'Case Studies',
                'description' => 'Dive into my diverse range of projects, showcasing my expertise in software development, design, and dedication to delivering exceptional results.',
            ]),

            'selectedRole' => $role,

            'roles' => collect(ProjectRole::cases())
                ->map(fn (ProjectRole $role) => [
                    'value' => $role->value,
                    'label' => $role->label(),
                ])
                ->values(),

            'projects' => ProjectsListingResource::collection($projects),
            'translations' => $getProjectPageTranslations(),
        ]);
    }
}
