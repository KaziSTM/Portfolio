<?php

namespace App\View\Components\Sections;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Features extends Component
{
    public string $description = '';

    public array $features = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->description = 'Where skill, efficiency, and responsiveness converge to deliver outstanding results tailored to your unique needs. I combine cutting-edge technology with creative solutions, ensuring the highest standards of excellence.';
        $this->features = [
            [
                'title' => 'Excellence',
                'description' => 'I take pride in doing things well. All client work is done with the best quality possible.',
                'icon' => 'trophy'
            ],
            [
                'title' => 'Speed',
                'description' => 'I like to work hard and fast. I know how important deadlines are to my clients.',
                'icon' => 'hourglass-high'
            ],
            [
                'title' => 'Responsiveness',
                'description' => 'You can rely on me to be responsive and clear whenever we work together.',
                'icon' => 'users'
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.features');
    }
}
