<?php

namespace App\Http\Controllers;

use App\Actions\Projects\BuildProjectCardData;
use App\Enums\ProjectRole;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectsListController extends Controller
{
    public function __invoke(
        Request $request,
        BuildProjectCardData $buildProjectCardData,
    ) {
        $role = $request->string('role')->toString();

        return Inertia::render('Projects/IndexView', [
            'selectedRole' => $role,

            'roles' => collect(ProjectRole::cases())
                ->map(fn(ProjectRole $role) => [
                    'value' => $role->value,
                    'label' => $role->label(),
                ])
                ->values(),

            'projects' => Project::query()
                ->when(
                    $role,
                    fn($query) => $query->withAnyTags([$role], 'main')
                )
                ->active()
                ->latest()
                ->paginate(6)
                ->through(
                    fn(Project $project) => ($buildProjectCardData)($project)
                ),
        ]);
    }
}
