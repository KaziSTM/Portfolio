<?php

namespace App\Actions\Cms\About\Sections;

use App\Support\Cms;

class GetIntroSection
{
    public function __invoke(): array
    {
        $locale = app()->getLocale();

        return Cms::section('about', 'intro', [
            'title' => 'Hi,',
            'highlight' => " I'm Youcef",
            'subtitle' => " and i'm a software engineer",
            'paragraphs' => [],
            'signature' => 'Youcef Nezrek',
        ],
        );
    }
}
