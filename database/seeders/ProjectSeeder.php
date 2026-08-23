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

        $logoPath = public_path("assets/images/projects/{$slug}-logo.webp");
        $main = public_path("assets/images/projects/{$slug}-main.webp");

        if (is_file($logoPath) && $project->getFirstMedia('logo')?->file_name !== basename($logoPath)) {
            $project->clearMediaCollection('logo');
            $project->addMedia($logoPath)->preservingOriginal()->toMediaCollection('logo');
        }

        if (is_file($logoPath) && $project->getFirstMedia('main')?->file_name !== basename($logoPath)) {
            $project->clearMediaCollection('main');
            $project->addMedia($logoPath)->preservingOriginal()->toMediaCollection('main');
        }

        $imagePaths = collect(range(1, 9))
            ->map(fn(int $index) => public_path("assets/images/projects/{$slug}-{$index}.webp"))
            ->filter(fn($path) => is_file($path))
            ->values();

        if ($imagePaths->isEmpty()) {
            return;
        }

        $currentImages = $project->getMedia('images')->pluck('file_name');
        $expectedImages = $imagePaths->map(fn($path) => basename($path));

        if ($currentImages->values()->all() === $expectedImages->all()) {
            return;
        }

        $project->clearMediaCollection('images');

        foreach ($imagePaths as $path) {
            $project->addMedia($path)->preservingOriginal()->toMediaCollection('images');
        }
    }
}
