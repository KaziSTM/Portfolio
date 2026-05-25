<?php

namespace App\Actions\Cms;

use App\Support\Cms;

class GetHeroSection
{
    public function __invoke(): array
    {
        return Cms::section('home', 'hero', [
            'kicker' => 'Helping businesses',
            'title' => 'build scalable digital products',
            'description' => 'Full-stack web developer focused on building scalable platforms and complex digital products. I specialize in backend architecture, APIs, and designing systems that handle real-world business logic efficiently.',
        ]);
    }
}
