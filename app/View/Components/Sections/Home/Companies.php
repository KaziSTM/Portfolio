<?php

namespace App\View\Components\Sections\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Companies extends Component
{
    public ?Collection $companies = null;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->companies = \App\Models\Company::take(10)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.home.companies');
    }
}
