<?php

namespace App\View\Components\Atoms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Cta extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public int $projectId, public bool $isPackage = false)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.atoms.cta');
    }
}
