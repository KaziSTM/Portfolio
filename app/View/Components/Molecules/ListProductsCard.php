<?php

namespace App\View\Components\Molecules;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListProductsCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Project $project, public bool $reverse = false)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.molecules.list-products-card');
    }
}
