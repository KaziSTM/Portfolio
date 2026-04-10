<?php

namespace App\View\Components\Sections\Home;

use App\Models\Project;
use App\Support\Cms;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Work extends Component
{
    public string $title;
    public string $description;
    public Collection $projects;

    public function __construct()
    {
        $content = Cms::section('home', 'work', [
            'title' => 'Check out my latest work',
            'description' => 'Discover how I craft scalable and impactful digital systems.',
        ]);

        $this->title = $content['title'];
        $this->description = $content['description'];

        $this->projects = Project::query()
            ->featured()
            ->latest()
            ->limit(4)
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.sections.home.work');
    }
}
