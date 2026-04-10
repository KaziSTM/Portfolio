<?php

namespace App\View\Components\Sections\About;

use App\Support\Cms;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Career extends Component
{
    public ?Collection $jobs = null;

    public string $title;

    public string $paragraph;

    public string $cvLabel;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->jobs = \App\Models\Career::query()
            ->with('company')
            ->orderBy('position')
            ->get();

        $content = Cms::section('about', 'career', [
            'title' => 'My career journey so far',
            'description' => 'My journey in web development started with a strong interest in building meaningful digital products and has evolved into designing and developing complex, scalable systems. I’ve worked on a wide range of applications, including e-commerce platforms, ERP solutions, and multi-tenant architectures, focusing on backend systems, APIs, and business-critical workflows. Each experience has strengthened my ability to deliver reliable, maintainable solutions that align with real-world operational needs.',
            'cv_label' => __('ui.actions.download_cv'),
        ]);

        $this->title = $content['title'];
        $this->paragraph = $content['description'];
        $this->cvLabel = $content['cv_label'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.about.career');
    }
}
