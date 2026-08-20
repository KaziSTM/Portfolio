<?php

namespace App\Actions\Cms;

use App\Support\Cms;

class GetHeaderSection
{
    public function __invoke(): array
    {
        return [
            'header_cta_label' => __('ui.actions.book_call'),
            'content' => Cms::section('global', 'header'),
        ];
    }
}
