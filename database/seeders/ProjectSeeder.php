<?php

namespace Database\Seeders;

use App\Actions\Data\Projects\GetProjects;
use App\Models\Company;
use App\Models\Project;
use Database\Seeders\Concerns\BuildsTranslations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    use BuildsTranslations;

    public function run(): void
    {
        DB::transaction(function (): void {

            $position = 1;
            foreach (GetProjects::make() as $projectData) {

                $companyId = null;

                if (!empty($projectData['company']) && strtolower($projectData['company']) !== 'personal') {
                    $company = Company::query()->firstOrCreate(
                        ['slug' => Str::slug($projectData['company'])],
                        [
                            'slug' => Str::slug($projectData['company']),
                            'name' => $projectData['company'],
                        ],
                    );
                    $companyId = $company->id;
                }

                $mainTags = $projectData['main_tags'] ?? [];
                $techTags = $projectData['tags'] ?? [];

                unset($projectData['company'], $projectData['main_tags'], $projectData['tags']);

                $projectData['company_id'] = $companyId;
                $projectData['position'] = $projectData['position'] ?? $position++;

                $project = Project::query()->updateOrCreate(
                    ['slug' => $projectData['slug']],
                    $projectData
                );

                $project->syncTagsWithType(
                    collect($mainTags)
                        ->map(fn($tag) => $tag->value)
                        ->toArray(),
                    'main'
                );

                $project->syncTagsWithType($techTags, 'tech');

                $this->syncMedia($project);
            }
        });
    }


    private function syncMedia(Project $project): void
    {
        $slug = $project->slug;

        $slugCandidates = array_unique(array_filter([
            $slug,
            $slug === 'tradetenant' ? 'trade-connect' : null,
        ]));

        $logoPath = null;
        $mainPath = null;

        foreach ($slugCandidates as $candidate) {
            foreach (['webp', 'png', 'jpg', 'jpeg'] as $ext) {
                if (! $logoPath && is_file(public_path("assets/images/projects/{$candidate}-logo.{$ext}"))) {
                    $logoPath = public_path("assets/images/projects/{$candidate}-logo.{$ext}");
                }
                if (! $mainPath && is_file(public_path("assets/images/projects/{$candidate}-main.{$ext}"))) {
                    $mainPath = public_path("assets/images/projects/{$candidate}-main.{$ext}");
                }
            }
        }

        if ($logoPath && $project->getFirstMedia('logo')?->file_name !== basename($logoPath)) {
            $project->clearMediaCollection('logo');
            $project->addMedia($logoPath)->preservingOriginal()->toMediaCollection('logo');
        }

        if ($mainPath && $project->getFirstMedia('main')?->file_name !== basename($mainPath)) {
            $project->clearMediaCollection('main');
            $project->addMedia($mainPath)->preservingOriginal()->toMediaCollection('main');
        }

        $imagePaths = collect();
        foreach ($slugCandidates as $candidate) {
            $paths = collect(range(1, 9))
                ->map(fn (int $index) => public_path("assets/images/projects/{$candidate}-{$index}.webp"))
                ->filter(fn ($path) => is_file($path));
            $imagePaths = $imagePaths->concat($paths);
        }
        $imagePaths = $imagePaths->unique()->values();

        if ($imagePaths->isEmpty()) {
            return;
        }

        $currentImages = $project->getMedia('images')->pluck('file_name');
        $expectedImages = $imagePaths->map(fn ($path) => basename($path));

        if ($currentImages->values()->all() === $expectedImages->all()) {
            return;
        }

        $project->clearMediaCollection('images');

        foreach ($imagePaths as $path) {
            $project->addMedia($path)->preservingOriginal()->toMediaCollection('images');
        }
    }
}
