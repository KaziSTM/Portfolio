<?php

namespace App\View\Components\Organisms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public array $socials = [];

    public array $navigation = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->socials = [
            'github' => [
                'name' => 'Github',
                'link' => 'https://github.com/KaziSTM',
                'icon' => 'github-logo'
            ], 'linkedin' => [
                'name' => 'Linkedin',
                'link' => 'https://linkedin.com/in/youcef-nezrek-7685a61a6',
                'icon' => 'linkedin-logo'
            ],
            'instagram' => [
                'name' => 'Instagram',
                'link' => 'https://www.instagram.com/that_mofo_kaz/',
                'icon' => 'instagram-logo'
            ],

        ];

        $this->navigation = [
            [
                'label' => 'Home',
                'route' => 'home',
            ],
            [
                'label' => 'About',
                'route' => '',
            ],
            [
                'label' => 'Work',
                'route' => '',
            ],
            [
                'label' => 'Contact',
                'route' => '',
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.organisms.footer');
    }
}
