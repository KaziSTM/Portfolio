<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('loads the localized homepage', function () {
    $this->get(route('home', ['locale' => 'en']))
        ->assertOk();
});

it('loads the filament admin create and cms pages for an authenticated user', function (string $routeName) {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route($routeName))
        ->assertOk();
})->with([
    'companies create page' => 'filament.admin.resources.companies.create',
    'careers create page' => 'filament.admin.resources.careers.create',
    'projects create page' => 'filament.admin.resources.projects.create',
    'cms page' => 'filament.admin.pages.manage-site-content',
]);
