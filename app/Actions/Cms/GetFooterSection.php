<?php

namespace App\Actions\Cms;

use App\Support\Cms;

class GetFooterSection
{
    public function __invoke(): array
    {
        return Cms::section('global', 'footer', [
            'title' => 'Lets make something great together',
            'description' => 'I’m always excited to collaborate on innovative projects or discuss potential opportunities. Feel free to reach out!',
            'button_label' => __('ui.actions.book_call'),
            'copyright' => '© 2024, All Rights Reserved',
        ]);
    }
}
