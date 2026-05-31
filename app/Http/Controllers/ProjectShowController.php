<?php

namespace App\Http\Controllers;

use App\Actions\Projects\BuildProjectShowData;
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
