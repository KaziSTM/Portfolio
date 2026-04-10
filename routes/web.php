<?php

use Illuminate\Support\Facades\Route;

$supportedLocales = implode('|', config('app.supported_locales', ['en']));

Route::pattern('locale', $supportedLocales);

Route::get('/', fn () => redirect()->route('home', ['locale' => app()->getLocale()]));
Route::get('/about', fn () => redirect()->route('about', ['locale' => app()->getLocale()]));
Route::get('/projects', fn () => redirect()->route('work', ['locale' => app()->getLocale()]));
Route::get('/projects/{projectId}', fn (int $projectId) => redirect()->route('projects.show', [
    'locale' => app()->getLocale(),
    'projectId' => $projectId,
]));
Route::get('/contact', fn () => redirect()->route('contact', ['locale' => app()->getLocale()]));

Route::prefix('{locale}')
    ->group(function (): void {
        Route::livewire('/', 'pages::home')->name('home');
        Route::livewire('/about', 'pages::about')->name('about');
        Route::livewire('/projects', 'pages::projects.index')->name('work');
        Route::livewire('/projects/{projectId}', 'pages::projects.show')->name('projects.show');
        Route::livewire('/contact', 'pages::contact')->name('contact');
    });
