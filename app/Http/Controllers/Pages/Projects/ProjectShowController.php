<?php

namespace App\Http\Controllers\Pages\Projects;

use App\Actions\Projects\BuildProjectShowData;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Inertia\Inertia;

class ProjectShowController extends Controller
{
    public function __invoke(
        string $locale,
        Project $project,
        BuildProjectShowData $buildProjectShowData,
    ) {

        $project->load([
            'company',
            'testimonials',
            'media',
        ]);

        return Inertia::render('Projects/ShowView', [
            'project' => $buildProjectShowData($project),
        ]);
    }
}
