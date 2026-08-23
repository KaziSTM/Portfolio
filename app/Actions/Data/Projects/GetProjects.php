<?php

namespace App\Actions\Data\Projects;

final readonly class GetProjects
{

    public static function make(): array
    {
        return [
            ...CompaniesProjects::get(),
            ...SelfProjects::get(),
        ];
    }
}
