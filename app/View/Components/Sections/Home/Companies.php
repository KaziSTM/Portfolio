<?php

namespace App\View\Components\Sections\Home;

use App\Support\Cms;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Companies extends Component
{
    public ?Collection $companies = null;

    public string $title = '';

    public string $highlight = '';

    public string $suffix = '';

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->companies = \App\Models\Company::query()
            ->whereNotIn('slug', ['freelance', 'personal'])
            ->take(10)
            ->get();

        $content = Cms::section('home', 'companies', [
            'title' => 'These are some',
            'highlight' => 'companies',
            'suffix' => 'I have worked with',
        ]);

        $this->title = $content['title'];
        $this->highlight = $content['highlight'];
        $this->suffix = $content['suffix'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.home.companies');
    }
}
