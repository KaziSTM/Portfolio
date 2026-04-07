<?php

namespace App\View\Components\Sections\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    public string $description = '';

    public array $socials = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->description = 'Full-stack web developer focused on building scalable platforms and complex digital products. I specialize in backend architecture, APIs, and designing systems that handle real-world business logic efficiently.';
        $this->socials = [
            'github' => [
                'link' => 'https://github.com/KaziSTM',
                'icon' => 'github-logo'
            ], 'linkedin' => [
                'link' => 'https://linkedin.com/in/youcef-nezrek-7685a61a6',
                'icon' => 'linkedin-logo'
            ],
            'instagram' => [
                'link' => 'https://www.instagram.com/that_mofo_kaz/',
                'icon' => 'instagram-logo'
            ],

        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.home.hero');
    }
}
