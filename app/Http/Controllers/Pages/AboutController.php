<?php

namespace App\Http\Controllers\Pages;

use App\Actions\Cms\About\GetAboutPageSections;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AboutController extends Controller
{
    public function __invoke(
        GetAboutPageSections $aboutPageSections,
    ) {

        return Inertia::render('AboutView', $aboutPageSections());
    }
}
