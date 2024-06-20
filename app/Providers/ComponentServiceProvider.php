<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        Blade::componentNamespace('\App\View\Components\Atoms', 'atoms');
        Blade::componentNamespace('\App\View\Components\Molecules', 'molecules');
        Blade::componentNamespace('\App\View\Components\Organisms', 'organisms');
        Blade::componentNamespace('\App\View\Components\Templates', 'templates');
        Blade::componentNamespace('\App\View\Components\Sections', 'sections');
    }
}
