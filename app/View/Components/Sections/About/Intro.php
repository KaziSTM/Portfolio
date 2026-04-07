<?php

namespace App\View\Components\Sections\About;

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
        $this->title = "Hi,";

        $this->highlight = " I'm Youcef";

        $this->subtitle = " and i'm a software engineer";

        $this->paragraphs = [
            "Based in Oran, Algeria, I focus on building scalable web platforms with a strong emphasis on backend architecture and real-world business logic. I work on complex systems such as e-commerce platforms, ERP solutions, and multi-tenant applications, designing APIs and infrastructures that are reliable, maintainable, and built to handle growth.",

            "My approach is centered around clean architecture, performance, and long-term maintainability. I prioritize building systems that are not only functional, but structured to evolve with business needs, ensuring clarity in code, efficiency in execution, and stability in production environments."
        ];

        $this->signature = "Youcef Nezrek";

        $this->image = asset('assets/images/portrait-2.jpg');
    }

    public function render(): View|Closure|string
    {
        return view('components.sections.about.intro');
    }
}
