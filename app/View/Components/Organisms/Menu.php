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
                'label' => 'Home',
                'route' => 'home',
                'icon' => 'home',

            ],
            // [
            //     'label' => 'Organized events',
            //     'route' => null,
            //     'icon' => 'bookmark',
            // ],
            // [
            //     'label' => 'New',
            //     'route' => null,
            //     'icon' => 'newspaper',
            // ],
            // [
            //     'label' => 'Contacts',
            //     'route' => null,
            //     'icon' => 'user',
            // ],
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
