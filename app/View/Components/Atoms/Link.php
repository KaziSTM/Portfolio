<?php

namespace App\View\Components\Atoms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Link extends Component
{

    public string $route = '';

    public string $label = '';

    public string $request = '';


    /**
     * Create a new component instance.
     */
    public function __construct(string $route = '', string $label = '')
    {
        $this->label = $label;
        $this->route = $route;
        $this->request = preg_replace('/\.index$/', '.*', $route);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.atoms.link');
    }
}
