<?php

namespace App\View\Components\Sections\About;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Stack extends Component
{
    public array $tools = [];

    public string $title;

    public string $paragraph;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {

        $this->title = 'A stack built for reliability and scale';

        $this->paragraph = "I focus on a carefully chosen set of technologies that allow me to build fast, maintainable, and scalable systems. Instead of chasing trends, I prioritize tools that integrate well together and support clean architecture, efficient workflows, and long-term stability. This stack enables me to deliver robust applications, from complex backends to responsive user interfaces.";

        $this->tools = [
            [
                'src' => asset('assets/svg/icons/php.svg'),
                "alt" => 'PHP'
            ],
            [
                'src' => asset('assets/svg/icons/mysql.svg'),
                "alt" => 'Mysql'
            ],
            [
                'src' => asset('assets/svg/icons/tailwindcss.svg'),
                "alt" => 'Tailwind Css'
            ],
            [
                'src' => asset('assets/svg/icons/alpinejs.svg'),
                "alt" => 'AlpineJs'
            ],
            [
                'src' => asset('assets/svg/icons/laravel.svg'),
                "alt" => 'Laravel'
            ],

            [
                'src' => asset('assets/svg/icons/livewire.svg'),
                "alt" => 'Livewire'
            ],
            [
                'src' => asset('assets/svg/icons/javascript.svg'),
                "alt" => 'Javascript'
            ],
            [
                'src' => asset('assets/svg/icons/vue.svg'),
                "alt" => 'VueJs'
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.about.stack');
    }
}
