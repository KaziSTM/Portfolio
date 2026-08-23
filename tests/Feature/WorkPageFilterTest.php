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
        ->where('filters.1.value', 'personal_projects')
        ->where('filters.1.label', 'Personal Projects')
        ->where('filters.2.value', 'packages')
        ->where('filters.2.label', 'Packages')
        ->where('translations.filters.all', 'All')
        ->where('translations.filters.company_projects', 'Company Projects')
        ->where('translations.filters.personal_projects', 'Personal Projects')
        ->where('translations.filters.packages', 'Packages')
        ->where('header.header_cta_label', 'Book a call')
    );
});

it('loads work page with correct translations for french', function () {
    $response = $this->get('/fr/projects');

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => $page
        ->component('Projects/IndexView', false)
        ->where('filters.0.label', 'Projets professionnels')
        ->where('filters.1.label', 'Projets personnels')
        ->where('filters.2.label', 'Packages')
        ->where('translations.filters.all', 'Tous')
        ->where('translations.filters.company_projects', 'Projets professionnels')
        ->where('translations.filters.personal_projects', 'Projets personnels')
        ->where('translations.filters.packages', 'Packages')
    );
});

it('loads work page with correct translations for arabic', function () {
    $response = $this->get('/ar/projects');

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => $page
        ->component('Projects/IndexView', false)
        ->where('filters.0.label', 'المشاريع المهنية')
        ->where('filters.1.label', 'المشاريع الشخصية')
        ->where('filters.2.label', 'الحزم')
        ->where('translations.filters.all', 'الكل')
        ->where('translations.filters.company_projects', 'المشاريع المهنية')
        ->where('translations.filters.personal_projects', 'المشاريع الشخصية')
        ->where('translations.filters.packages', 'الحزم')
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

it('filters personal projects correctly', function () {
    $response = $this->get('/en/projects?filter=personal_projects');

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => $page
        ->component('Projects/IndexView', false)
        ->where('selectedFilter', 'personal_projects')
    );
});

it('filters packages correctly', function () {
    $response = $this->get('/en/projects?filter=packages');

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => $page
        ->component('Projects/IndexView', false)
        ->where('selectedFilter', 'packages')
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
