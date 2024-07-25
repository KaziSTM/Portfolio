<?php

namespace App\View\Components\Sections\Home;

use Closure;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class Tools extends Component
{

    public array $tools = [];
    /**
     * Create a new component instance.
     */
    public function mount()
    {
        $this->tools = [
            [
                'src' => asset('assets/svg/icons/php.svg'),
                "alt" => 'PHP'
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
                'src' => asset('assets/svg/icons/mysql.svg'),
                "alt" => 'Mysql'
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


    public function render(): View|Closure|string
    {
        return view('components.sections.home.tools');
    }
}
