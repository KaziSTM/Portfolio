<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function (): void {
            $company = Company::query()->where('name', 'Techfly')->firstOrFail();

            $project = Project::query()->updateOrCreate(
                ['slug' => Str::slug('kheops')],
                [
                    'name' => 'Kheops',
                    'header' => 'Kheops ,an AI-driven Platform offering professional B2B solutions.',
                    'description' => 'I contributed to the development and enhancement of Kheops.ai by working on the central and tenant applications, and implementing new features to improve user engagement and operational efficiency.',
                    'company_id' => $company->id,
                    'link' => 'https://kheops.ai',
                    'details' => "Kheops.ai is a French generative AI platform tailored to enhance productivity in SMEs, particularly those operating in real estate, housing, and other business sectors. Here’s a summary of its key features and offerings:

Generative AI: Kheops uses a sovereign generative AI model designed to integrate seamlessly with a company's internal databases and business processes. This model is optimized for generating relevant and culturally appropriate content in French, helping businesses improve efficiency and content quality.

Business Integration: The platform is built to support various business processes including product development, operations, marketing, and HR. It offers domain-specific generative AI models, starting with a focus on real estate, to ensure the content it produces is highly relevant and up-to-date​ ​.

Open Source and Security: Kheops emphasizes transparency and adaptability with its open-source approach. The platform is designed with robust security protocols to ensure the safe handling of business data, making it suitable for sensitive applications​ ​.

Collaboration and Document Management: Kheops includes features for real-time co-editing and document management, allowing multiple users to work on AI-assisted content simultaneously. This makes it ideal for collaborative environments​ ​.",
                    'start' => '2023-08-01',
                    'end' => now(),
                ],
            );

            $slug = Str::slug($project->name);
            $logoPath = public_path("assets/images/projects/{$slug}-main.jpg");

            if (is_file($logoPath) && $project->getFirstMedia('logo')?->file_name !== basename($logoPath)) {
                $project->clearMediaCollection('logo');
                $project->addMedia($logoPath)->preservingOriginal()->toMediaCollection('logo');
            }

            $imagePaths = collect(range(1, 9))
                ->map(fn (int $index): string => public_path("assets/images/projects/{$slug}-{$index}.jpg"))
                ->filter(fn (string $path): bool => is_file($path))
                ->values();

            if ($imagePaths->isEmpty()) {
                return;
            }

            $currentImages = $project->getMedia('images')->pluck('file_name');
            $expectedImages = $imagePaths->map(fn (string $path): string => basename($path));

            if ($currentImages->values()->all() === $expectedImages->all()) {
                return;
            }

            $project->clearMediaCollection('images');

            foreach ($imagePaths as $path) {
                $project->addMedia($path)->preservingOriginal()->toMediaCollection('images');
            }
        });
    }
}
