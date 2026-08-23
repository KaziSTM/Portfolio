<?php

use App\Models\Project;
use Inertia\Testing\AssertableInertia as Assert;

it('loads work page with correct filter options and translations for english', function () {
    $response = $this->get('/en/projects');

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => $page
        ->component('Projects/IndexView', false)
        ->has('filters', 3)
        ->where('filters.0.value', 'company_projects')
        ->where('filters.0.label', 'Company Projects')
        ->where('filters.1.value', 'freelance_projects')
        ->where('filters.1.label', 'Freelance Projects')
        ->where('filters.2.value', 'open_source')
        ->where('filters.2.label', 'Open Source')
        ->where('translations.filters.all', 'All')
        ->where('translations.filters.company_projects', 'Company Projects')
        ->where('translations.filters.freelance_projects', 'Freelance Projects')
        ->where('translations.filters.open_source', 'Open Source')
        ->where('header.header_cta_label', 'Book a call')
    );
});

it('loads work page with correct translations for french', function () {
    $response = $this->get('/fr/projects');

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => $page
        ->component('Projects/IndexView', false)
        ->where('filters.0.label', 'Projets en entreprise')
        ->where('filters.1.label', 'Projets freelance')
        ->where('filters.2.label', 'Open Source')
        ->where('translations.filters.all', 'Tous')
        ->where('translations.filters.company_projects', 'Projets en entreprise')
        ->where('translations.filters.freelance_projects', 'Projets freelance')
        ->where('translations.filters.open_source', 'Open Source')
    );
});

it('loads work page with correct translations for arabic', function () {
    $response = $this->get('/ar/projects');

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => $page
        ->component('Projects/IndexView', false)
        ->where('filters.0.label', 'مشاريع الشركات')
        ->where('filters.1.label', 'المشاريع المستقلة')
        ->where('filters.2.label', 'مفتوحة المصدر')
        ->where('translations.filters.all', 'الكل')
        ->where('translations.filters.company_projects', 'مشاريع الشركات')
        ->where('translations.filters.freelance_projects', 'المشاريع المستقلة')
        ->where('translations.filters.open_source', 'مفتوحة المصدر')
    );
});

it('filters company projects correctly', function () {
    $response = $this->get('/en/projects?filter=company_projects');

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => $page
        ->component('Projects/IndexView', false)
        ->where('selectedFilter', 'company_projects')
    );
});

it('filters freelance projects correctly', function () {
    $response = $this->get('/en/projects?filter=freelance_projects');

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => $page
        ->component('Projects/IndexView', false)
        ->where('selectedFilter', 'freelance_projects')
    );
});

it('filters open source projects correctly', function () {
    $response = $this->get('/en/projects?filter=open_source');

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => $page
        ->component('Projects/IndexView', false)
        ->where('selectedFilter', 'open_source')
    );
});

it('orders projects by position on the work page', function () {
    $response = $this->get('/en/projects');

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => $page
        ->component('Projects/IndexView', false)
        ->has('projects.data')
    );
});

it('includes ongoing translation on project show page', function () {
    $project = Project::first();
    $project->update([
        'is_in_progress' => true,
        'end' => null,
    ]);

    $response = $this->get("/en/projects/{$project->id}");

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => $page
        ->component('Projects/ShowView', false)
        ->where('translations.projects.ongoing', 'Ongoing')
    );
});
