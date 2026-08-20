<?php

namespace App\Http\Controllers\Pages;

use App\Actions\Cms\Home\GetHomePageSections;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __invoke(
        GetHomePageSections $getHomePageSections,
    ) {
        return Inertia::render('HomeView', $getHomePageSections());
    }
}
