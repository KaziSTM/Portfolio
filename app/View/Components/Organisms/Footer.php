<?php

namespace App\View\Components\Organisms;

use App\Support\Cms;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public array $socials = [];

    public array $navigation = [];

    public array $content = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->content = Cms::section('global', 'footer', [
            'title' => 'Lets make something great together',
            'description' => 'I’m always excited to collaborate on innovative projects or discuss potential opportunities. Feel free to reach out!',
            'button_label' => __('ui.actions.book_call'),
            'copyright' => '© 2024, All Rights Reserved',
        ]);

        $this->socials = Cms::section('global', 'socials', [
            'items' => [
                [
                    'name' => 'Github',
                    'link' => 'https://github.com/KaziSTM',
                    'icon' => 'github-logo',
                ],
                [
                    'name' => 'Linkedin',
                    'link' => 'https://linkedin.com/in/youcef-nezrek-7685a61a6',
                    'icon' => 'linkedin-logo',
                ],
                [
                    'name' => 'Instagram',
                    'link' => 'https://www.instagram.com/that_mofo_kaz/',
                    'icon' => 'instagram-logo',
                ],
            ],
        ])['items'];

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
            [
                'label' => 'ui.navigation.contact',
                'route' => 'contact',
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
