<?php

namespace App\Actions\Cms;

use App\Support\Cms;

class GetSocialLinks
{
    public function __invoke(): array
    {
        return Cms::section('global', 'socials', [
            'items' => [
                [
                    'name' => 'Github',
                    'link' => 'https://github.com/KaziSTM',
                    'icon' => 'github-logo',
                ],
                [
                    'name' => 'Linkedin',
                    'link' => 'https://linkedin.com/in/youcef-nezrek-7685a61a6',
                    'icon' => 'linkedin-logo',
                ],
                [
                    'name' => 'Instagram',
                    'link' => 'https://www.instagram.com/that_mofo_kaz/',
                    'icon' => 'instagram-logo',
                ],
            ],
        ])['items'];
    }
}
