<?php

namespace App\View\Components\Sections;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Work extends Component
{

    public string $title = '';

    public string $description = '';

    public ?Collection $projects = null;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->title = 'Check out my latest work';
        $this->description = 'Discover how I craft digital experiences that enhance everyday lives. My latest projects blend intuitive design with robust functionality to create solutions that are not just effective, but delightful. Dive in to see how my work makes technology feel effortless and engaging!';
        $this->projects = \App\Models\Project::latest()->limit(4)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.work');
    }
}
