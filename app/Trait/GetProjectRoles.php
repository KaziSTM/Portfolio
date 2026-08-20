<?php

namespace App\Trait;

trait GetProjectRoles
{
    public function getRoles(): array
    {
        return $this->roles()
            ->map(fn ($role) => $role->label())
            ->values()
            ->toArray();
    }

    public function getTechTags(): array
    {
        return $this->techTags()
            ->pluck('name')
            ->values()
            ->toArray();

    }
}
