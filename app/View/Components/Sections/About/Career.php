<?php

namespace App\View\Components\Sections\About;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Career extends Component
{
    public ?Collection $jobs = null;

    public string $paragraph;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->jobs = \App\Models\Career::all();

        $this->paragraph = "My journey in web development started with a strong interest in building meaningful digital products and has evolved into designing and developing complex, scalable systems. I’ve worked on a wide range of applications, including e-commerce platforms, ERP solutions, and multi-tenant architectures, focusing on backend systems, APIs, and business-critical workflows. Each experience has strengthened my ability to deliver reliable, maintainable solutions that align with real-world operational needs.";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.about.career');
    }
}
