<?php

namespace Database\Seeders;

use App\Enums\ProjectRole;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function (): void {

            foreach ($this->projects() as $projectData) {

                $company = Company::query()
                    ->firstOrCreate(['name' => $projectData['company']]);

                $mainTags = $projectData['main_tags'] ?? [];
                $techTags = $projectData['tags'] ?? [];

                unset($projectData['company'], $projectData['main_tags'], $projectData['tags']);

                $projectData['company_id'] = $company->id;

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

    private function projects(): array
    {
        return [
            [
                'company' => 'Techfly',
                'slug' => Str::slug('Kheops'),
                'name' => 'Kheops',
                'header' => 'AI-powered platform for business automation and contextual intelligence.',
                'description' => 'Enterprise AI platform integrating LLMs, RAG pipelines, and automation.',
                'link' => 'https://kheops.ai',
                'main_tags' => [
                    ProjectRole::BACKEND,
                    ProjectRole::FULLSTACK,
                ],
                'tags' => ['AI', 'LLM', 'RAG', 'API', 'SaaS'],
                'start' => '2023-08-01',
                'end' => '2024-10-01',
                'is_featured' => true,
                'details' => "# Kheops AI — Building an Enterprise AI Automation Platform

Kheops is an AI-powered platform designed to help businesses leverage their internal data through intelligent automation, contextual search, and AI-driven workflows.

## The Challenge

Companies struggle to extract value from unstructured data such as documents, audio, and internal knowledge, while existing tools lack contextual intelligence and integration capabilities.

## The Approach

The platform was built around a modular, API-first architecture powered by a RAG pipeline. Data ingestion pipelines transform raw inputs into structured knowledge, while hybrid search ensures accurate and performant retrieval. AI agents automate repetitive workflows and improve operational efficiency.

## My Contribution

- Designed backend architecture for AI-driven features
- Built APIs for AI and external integrations
- Developed data processing pipelines
- Optimized performance and scalability

## Outcome

Kheops enables contextual AI responses, workflow automation, and scalable data processing, significantly reducing manual operations and improving decision-making.

## Takeaways

Effective AI systems rely on strong backend architecture, data pipelines, and integration—not just models.",
            ],
            [
                'company' => 'Techfly',
                'slug' => Str::slug('GCCO Reservation Platform'),
                'name' => 'GCCO Reservation Platform',
                'header' => 'Flexible multi-user reservation system.',
                'description' => 'Advanced booking platform with shared capacity logic.',
                'link' => 'https://reservation.gcco.dz/',
                'main_tags' => [
                    ProjectRole::BACKEND,
                    ProjectRole::FULLSTACK,
                ],
                'tags' => ['Reservation', 'Concurrency', 'API'],
                'start' => '2023-03-01',
                'end' => '2023-10-01',
                'details' => "# GCCO Reservation Platform — Designing a Flexible Multi-User Booking System

The GCCO platform is a reservation system designed to manage event spaces where multiple users can book the same space simultaneously under controlled conditions.

## The Challenge

Traditional booking systems assume one user per time slot. GCCO required a more flexible model where:
- Multiple users can share the same space
- Reservations depend on capacity, event type, and overlaps
- The system must remain consistent under concurrent usage

## The Approach

A capacity-based reservation engine was implemented, allowing dynamic availability instead of static slot blocking. The system evaluates bookings in real-time based on usage and constraints.

A layered validation system ensures reliability:
- Input validation
- Business rule enforcement (capacity, overlaps)
- Transactional integrity for concurrent requests

## My Contribution

- Designed and built the full backend architecture
- Implemented the reservation engine and booking logic
- Developed APIs for mobile and frontend integration
- Handled concurrency and edge cases
- Contributed to frontend when needed

## Outcome

The platform delivers a flexible and reliable booking experience, supporting shared reservations while preventing conflicts and ensuring data consistency.

## Takeaways

Complex systems are defined by their edge cases. Building flexible reservation logic requires strong validation, concurrency handling, and precise business rule modeling.",
            ],
            [
                'company' => 'Techfly',
                'slug' => Str::slug('PASSMEMO'),
                'name' => 'PASSMEMO',
                'header' => 'AI platform for structuring life stories.',
                'description' => 'Dynamic data collection and processing system.',
                'link' => 'https://passmemo.fr/fr',
                'main_tags' => [
                    ProjectRole::BACKEND,
                ],
                'tags' => ['Dynamic Forms', 'Data Processing', 'AI'],
                'start' => '2023-01-01',
                'end' => '2024-01-01',
                'details' => "# PASSMEMO — Structuring Human Stories Through Data and AI

PASSMEMO is a platform designed for elderly care homes in France, focused on capturing, processing, and transforming residents' life stories into structured digital content.

## The Challenge

The core challenge was handling highly unstructured and sensitive data:
- Life stories collected through dynamic forms and interviews
- Audio recordings requiring transcription and structuring
- Complex, evolving data models depending on each use case

The system needed to remain flexible while producing consistent, usable outputs.

## The Approach

A backend-first architecture was implemented to support dynamic data collection and processing.

At the core of the system is a **dynamic form engine**, allowing flexible definition of data structures without requiring code changes. This enables adapting questionnaires and inputs to different contexts and users.

On top of that, data processing pipelines were built to:
- Handle audio transcription
- Normalize and structure collected data
- Prepare content for AI-driven transformation into readable narratives

The platform exposes a clean API layer, enabling integration with frontend applications and content generation workflows.

## My Contribution

- Designed and developed the full API layer
- Built the dynamic form handling system
- Implemented data processing pipelines
- Structured and normalized complex datasets
- Ensured scalability and maintainability of backend systems

## Outcome

The platform enables care institutions to:
- Capture rich personal histories in a structured way
- Transform raw data into meaningful digital content
- Streamline data collection and processing workflows

## Takeaways

This project emphasized the importance of **flexible data modeling** and **processing pipelines** when dealing with unstructured human data.

Designing systems that adapt to data—rather than forcing rigid schemas—is key to building scalable and meaningful applications.",
            ],
        ];
    }

    private function syncMedia(Project $project): void
    {
        $slug = Str::slug($project->name);

        $logoPath = public_path("assets/images/projects/{$slug}-main.png");

        if (is_file($logoPath) && $project->getFirstMedia('logo')?->file_name !== basename($logoPath)) {
            $project->clearMediaCollection('logo');
            $project->addMedia($logoPath)->preservingOriginal()->toMediaCollection('logo');
        }

        $imagePaths = collect(range(1, 9))
            ->map(fn(int $index) => public_path("assets/images/projects/{$slug}-{$index}.jpg"))
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
