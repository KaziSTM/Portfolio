<?php

namespace App\Enums;

enum ProjectType: string
{
    case PROJECT = 'project';
    case PACKAGE = 'package';

    public function label(): string
    {
        return __('ui.project_types.' . $this->value);
    }
}
