<?php

namespace App\View\Components\Sections\Home;

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
        $this->description = 'I focus on delivering reliable, scalable solutions with a strong emphasis on backend architecture, performance, and clean implementation of complex business logic.';
        $this->features = [
            [
                'title' => 'Scalable Architecture',
                'description' => 'Systems designed to handle growth, complexity, and real-world usage without breaking down.',
                'icon' => 'heroicon-o-rectangle-stack'
            ],
            [
                'title' => 'Clean & Maintainable Code',
                'description' => 'Well-structured, readable codebases that are easy to extend, debug, and maintain over time.',
                'icon' => 'heroicon-o-code-bracket'
            ],
            [
                'title' => 'Reliable Delivery',
                'description' => 'Consistent execution with attention to performance, edge cases, and production readiness.',
                'icon' => 'heroicon-o-check-circle'
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.home.features');
    }
}
