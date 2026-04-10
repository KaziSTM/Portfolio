<?php

namespace App\View\Components\Organisms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    public array $navigation = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->navigation = [
            [
                'label' => 'ui.navigation.home',
                'route' => 'home',
            ],
            [
                'label' => 'ui.navigation.about',
                'route' => 'about',
            ],
            [
                'label' => 'ui.navigation.work',
                'route' => 'work',
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.organisms.menu');
    }
}
