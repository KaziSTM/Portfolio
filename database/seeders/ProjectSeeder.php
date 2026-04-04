<?php

namespace Database\Seeders;

use App\Enums\ProjectRole;
use App\Enums\ProjectType;
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
            [
                'company' => 'Zimou Group',
                'slug' => Str::slug('MyEcom ERP And Installer'),
                'name' => 'MyEcom ERP & Installer',
                'header' => 'All-in-one ERP and onboarding platform for e-commerce operations.',
                'description' => 'Comprehensive ERP system combined with an automated onboarding and provisioning platform, enabling merchants to manage and scale their e-commerce operations from a single ecosystem.',
                'link' => 'https://myecom.dev/fr',
                'main_tags' => [
                    ProjectRole::BACKEND,
                    ProjectRole::FULLSTACK,
                ],
                'tags' => [
                    'ERP',
                    'SaaS',
                    'Multi-Tenant',
                    'Provisioning',
                    'Automation',
                    'API',
                    'Filament',
                    'Dashboard',
                    'E-commerce',
                ],
                'details' => "# MyEcom — Building a Scalable E-commerce ERP with Automated Onboarding

MyEcom is a full-scale ERP platform designed to centralize and automate e-commerce operations, combined with an installer system that provisions and configures new instances for merchants.

The platform brings together all core business workflows — orders, stock, logistics, CRM, and analytics — into a unified system, allowing businesses to manage their operations from a single interface. :contentReference[oaicite:0]{index=0}

## The Challenge

The main challenge was building a system that is both:
- Powerful enough to handle complex business operations
- Simple enough to onboard non-technical users

Additionally, the installer introduced new constraints:
- Automating instance creation and configuration
- Supporting multi-tenant architecture at scale
- Ensuring isolation and performance across tenants

## The Approach

The system was designed as a modular, API-first ERP with a strong backend foundation.

A multi-tenant architecture enables each merchant to operate independently while sharing the same infrastructure. On top of this, an installer layer was built to automate the full onboarding flow — from account creation to ready-to-use ERP instance.

The backend dashboard, built with Filament, provides full control over:
- Orders, inventory, and logistics
- CRM and customer lifecycle
- Integrations with delivery providers and external services

Automation plays a central role, ensuring smooth coordination between different business workflows and reducing manual intervention. :contentReference[oaicite:1]{index=1}

## My Contribution

- Designed and implemented core backend architecture
- Built and maintained APIs for ERP modules and integrations
- Developed the Filament-based admin dashboard
- Worked on the installer system for automated provisioning
- Contributed to frontend features using TALL stack
- Optimized performance and scalability across tenants

## Outcome

MyEcom delivers a unified ecosystem where businesses can:
- Manage all operations from a single platform
- Automate workflows across teams
- Scale efficiently with minimal manual setup

The combination of ERP + installer significantly reduces onboarding friction while enabling long-term scalability.

## Takeaways

This project highlighted the importance of combining **system architecture with operational automation**.

Building an ERP is not just about features — it’s about designing a system that can scale across multiple businesses while remaining reliable, flexible, and easy to onboard.",
                'start' => '2025-03-01',
                'end' => now(),
                'is_featured' => true,
            ],
            [
                'company' => 'Freelance',
                'slug' => Str::slug('Halal Audit Landing Page'),
                'name' => 'Halal Audit',
                'header' => 'Modern landing page for halal certification and audit services.',
                'description' => 'Corporate landing page designed to present halal audit and certification services with a strong focus on clarity, trust, and conversion.',
                'link' => 'https://halal-audit.com/en/',
                'main_tags' => [
                    ProjectRole::FULLSTACK,
                ],
                'tags' => [
                    'Landing Page',
                    'Corporate Website',
                    'UI/UX',
                    'TALL Stack',
                    'SEO',
                    'Performance',
                ],
                'details' => "# Halal Audit — Designing a High-Conversion Corporate Landing Page

Halal Audit is a corporate website built to present halal certification and audit services, targeting businesses that need to comply with international halal standards.

A halal audit is a structured evaluation of processes, ingredients, and operations to ensure compliance with Islamic regulations and certification requirements. :contentReference[oaicite:0]{index=0}

## The Challenge

The main challenge was not technical complexity, but **communication and positioning**:

- Presenting a technical and regulatory service in a clear way
- Building trust with a professional and authoritative design
- Structuring content for both readability and conversion
- Ensuring accessibility for an international audience

## The Approach

The website was designed as a **conversion-focused landing page**, with a strong emphasis on clarity and structure.

Content was organized to:
- Explain the concept of halal auditing in simple terms
- Highlight services and value propositions
- Guide users through a clear call-to-action flow

From a technical perspective, the implementation focused on:
- Clean, maintainable frontend using TALL stack
- Optimized performance and fast loading times
- SEO-friendly structure for better visibility

## My Contribution

- Developed the full backend structure
- Built the frontend using TALL stack
- Structured the content flow for better UX
- Optimized performance and responsiveness

## Outcome

The result is a clean and professional landing page that:
- Clearly communicates complex services
- Builds credibility and trust
- Guides users toward conversion effectively

## Takeaways

This project reinforced that even simple products require strong execution.

A well-designed landing page is not just about visuals — it’s about **clear messaging, structure, and performance working together to drive results**.",
                'start' => '2022-06-01',
                'end' => '2022-07-01',
            ],
            /*
          |--------------------------------------------------------------------------
          | Packages
          |--------------------------------------------------------------------------
          */

            [
                'company' => 'Personal',
                'type' => ProjectType::PACKAGE,
                'slug' => Str::slug('Algeria Geo'),
                'name' => 'Algeria Geo',
                'header' => 'Standardized Algerian geographic dataset for Laravel applications.',
                'description' => 'Laravel package providing structured wilaya and commune data with a clean API for consistent location handling.',
                'link' => 'https://github.com/KaziSTM/algeria-geo',
                'main_tags' => [
                    ProjectRole::BACKEND,
                ],
                'tags' => [
                    'Laravel Package',
                    'Geolocation',
                    'Data Modeling',
                    'API',
                ],
                'details' => "# Algeria Geo — Standardizing Location Data in Laravel

A lightweight Laravel package providing normalized Algerian geographic data (wilayas and communes) through a clean and reusable API.

Designed to eliminate inconsistencies in location handling across projects and provide a reliable foundation for address-based systems.",
                'is_featured' => false,
            ],

            [
                'company' => 'Personal',
                'type' => ProjectType::PACKAGE,
                'slug' => Str::slug('Subscriptions Package'),
                'name' => 'Laravel Subscriptions',
                'header' => 'Flexible subscription engine with feature-based limitations.',
                'description' => 'Custom Laravel subscription system supporting modular features, limitations, and scalable SaaS billing logic.',
                'link' => 'https://github.com/KaziSTM/subscriptions',
                'main_tags' => [
                    ProjectRole::BACKEND,
                ],
                'tags' => [
                    'Laravel Package',
                    'SaaS',
                    'Billing',
                    'Architecture',
                ],
                'details' => "# Laravel Subscriptions — Modular SaaS Billing Engine

A flexible subscription system built for SaaS applications, focusing on feature-based limitations and scalable architecture.

Designed to support complex billing logic while remaining extensible and developer-friendly.",
                'is_featured' => true,
            ],

            /*
            |--------------------------------------------------------------------------
            | Platform (Vargo / DzShip)
            |--------------------------------------------------------------------------
            */

            [
                'company' => 'Personal',
                'type' => ProjectType::PROJECT,
                'slug' => Str::slug('Vargo Delivery Platform'),
                'name' => 'Vargo',
                'header' => 'Unified delivery integration platform for Algerian logistics providers.',
                'description' => 'Platform and SDK ecosystem enabling developers to integrate multiple delivery providers through a single unified API.',
                'link' => null,
                'main_tags' => [
                    ProjectRole::BACKEND,
                    ProjectRole::FULLSTACK,
                ],
                'tags' => [
                    'SDK',
                    'API',
                    'Logistics',
                    'Integration',
                    'Laravel Package',
                ],
                'details' => "# Vargo — Unified Delivery Integration Platform

Vargo is a platform designed to standardize integrations with Algerian delivery providers through a unified API and SDK ecosystem.

It abstracts provider-specific complexities behind a consistent developer experience, allowing applications to interact with multiple carriers through a single interface.

## The Approach

The system is built around a driver-based architecture, where each provider is implemented as a dedicated driver while sharing a normalized contract.

The SDK layer ensures:
- Consistent request structure
- Provider abstraction
- Scalable integration model

## Takeaways

This project focuses on **API design and abstraction**, ensuring simplicity for consumers while handling complexity internally.",
                'is_in_progress' => true,
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
