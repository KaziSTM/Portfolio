<?php

namespace App\View\Components\Sections\About;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Stack extends Component
{
    public array $tools = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
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
