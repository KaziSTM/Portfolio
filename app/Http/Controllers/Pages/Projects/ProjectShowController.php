<?php

namespace App\Http\Controllers\Pages\Projects;

use App\Actions\Translations\GetProjectPageTranslations;
use App\Http\Controllers\Controller;
use App\Http\Resources\Projects\ProjectShowResource;
use App\Models\Project;
use Inertia\Inertia;

class ProjectShowController extends Controller
{
    public function __invoke(
        string $locale,
        Project $project,
        GetProjectPageTranslations $getProjectPageTranslations,
    ) {

        $project->load([
            'company',
            'testimonials',
            'media',
            'tags',
        ]);

        return Inertia::render('Projects/ShowView', [
            'project' => new ProjectShowResource($project),
            'translations' => $getProjectPageTranslations(),
        ]);
    }
}
