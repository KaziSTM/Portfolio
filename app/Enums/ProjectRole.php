<?php

namespace App\Enums;

enum ProjectRole: string
{
    case BACKEND = 'backend';
    case FULLSTACK = 'fullstack';
    case FRONTEND = 'frontend';

    public function label(): string
    {
        return __('ui.project_roles.' . $this->value);
    }

    public function color(): string
    {
        return match ($this) {
            self::BACKEND => 'primary',
            self::FULLSTACK => 'success',
            self::FRONTEND => 'warning',
        };
    }
}
