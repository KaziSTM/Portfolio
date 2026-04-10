<?php

namespace App\View\Components\Sections\Home;

use App\Support\Cms;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    public string $intro = '';

    public string $kicker = '';

    public string $title = '';

    public string $description = '';

    public array $socials = [];

    public string $ctaLabel = '';

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $content = Cms::section('home', 'hero', [
            'kicker' => 'Helping businesses',
            'title' => 'build scalable digital products',
            'description' => 'Full-stack web developer focused on building scalable platforms and complex digital products. I specialize in backend architecture, APIs, and designing systems that handle real-world business logic efficiently.',
            'cta_label' => __('ui.actions.book_call'),
        ]);

        $this->intro = $content['intro'];
        $this->kicker = $content['kicker'];
        $this->title = $content['title'];
        $this->description = $content['description'];
        $this->ctaLabel = $content['cta_label'];
        $this->socials = Cms::section('global', 'socials', [
            'items' => [
                ['name' => 'Github', 'link' => 'https://github.com/KaziSTM', 'icon' => 'github-logo'],
                ['name' => 'Linkedin', 'link' => 'https://linkedin.com/in/youcef-nezrek-7685a61a6', 'icon' => 'linkedin-logo'],
                ['name' => 'Instagram', 'link' => 'https://www.instagram.com/that_mofo_kaz/', 'icon' => 'instagram-logo'],
            ],
        ])['items'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.home.hero');
    }
}
