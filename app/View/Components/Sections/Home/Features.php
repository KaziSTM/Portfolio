<?php

namespace App\View\Components\Sections\Home;

use App\Support\Cms;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Features extends Component
{
    public string $title = '';

    public string $description = '';

    public array $features = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $content = Cms::section('home', 'features', [
            'title' => 'How I build reliable systems',
            'description' => 'I focus on delivering reliable, scalable solutions with a strong emphasis on backend architecture, performance, and clean implementation of complex business logic.',
            'items' => [],
        ]);

        $this->title = $content['title'];
        $this->description = $content['description'];
        $this->features = $content['items'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.home.features');
    }
}
