<?php

namespace App\View\Components\Sections\About;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class Career extends Component
{
    public ?Collection $jobs = null;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->jobs = \App\Models\Career::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.about.career');
    }
}
