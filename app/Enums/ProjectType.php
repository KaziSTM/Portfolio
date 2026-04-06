<?php

namespace App\Enums;

enum ProjectType: string
{
    case PROJECT = 'project';
    case PACKAGE = 'package';

    public function label(): string
    {
        return match ($this) {
            self::PROJECT => 'Project',
            self::PACKAGE => 'Package',
        };
    }
}
