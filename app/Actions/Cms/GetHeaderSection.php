<?php

namespace App\Actions\Cms;

use App\Support\Cms;

class GetHeaderSection
{
    public function __invoke(): array
    {
        return Cms::section('global', 'header');
    }
}
