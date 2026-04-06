<?php

namespace App\Enums;

enum ProjectRole: string
{
    case BACKEND = 'backend';
    case FULLSTACK = 'fullstack';
    case FRONTEND = 'frontend';

    public function label(): string
    {
        return match ($this) {
            self::BACKEND => 'Backend',
            self::FULLSTACK => 'Full-Stack',
            self::FRONTEND => 'Frontend',
        };
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
