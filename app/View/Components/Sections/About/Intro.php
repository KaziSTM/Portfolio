<?php

namespace App\View\Components\Sections\About;

use App\Support\Cms;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Intro extends Component
{
    public string $title;
    public string $highlight;
    public string $subtitle;
    public array $paragraphs;
    public string $signature;
    public string $image;

    public function __construct()
    {
        $content = Cms::section('about', 'intro', [
            'title' => 'Hi,',
            'highlight' => " I'm Youcef",
            'subtitle' => " and i'm a software engineer",
            'paragraphs' => [],
            'signature' => 'Youcef Nezrek',
        ]);

        $this->title = $content['title'];
        $this->highlight = $content['highlight'];
        $this->subtitle = $content['subtitle'];
        $this->paragraphs = $content['paragraphs'];
        $this->signature = $content['signature'];

        $this->image = asset('assets/images/portrait-2.jpg');
    }

    public function render(): View|Closure|string
    {
        return view('components.sections.about.intro');
    }
}
