<?php

use App\Http\Controllers\Pages\AboutController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\Projects\ProjectShowController;
use App\Http\Controllers\Pages\Projects\ProjectsListController;
use Illuminate\Support\Facades\Route;

$supportedLocales = implode('|', config('app.supported_locales', ['en']));

Route::pattern('locale', $supportedLocales);

Route::get('/', fn() => redirect()->route('home', ['locale' => app()->getLocale()]));
Route::get('/about', fn() => redirect()->route('about', ['locale' => app()->getLocale()]));
Route::get('/projects', fn() => redirect()->route('work', ['locale' => app()->getLocale()]));
Route::get('/projects/{projectId}', fn(int $projectId) => redirect()->route('projects.show', [
    'locale' => app()->getLocale(),
    'projectId' => $projectId,
]));
Route::get('/contact', fn() => redirect()->route('contact', ['locale' => app()->getLocale()]));

Route::prefix('{locale}')
    ->group(function (): void {
        Route::get('/', HomeController::class)->name('home');
        Route::get('/projects', ProjectsListController::class)->name('work');
        Route::get('/projects/{project}', ProjectShowController::class)
            ->name('projects.show');

        Route::get('/about', AboutController::class)->name('about');
        Route::livewire('/contact', 'Pages::contact')->name('contact');
    });
