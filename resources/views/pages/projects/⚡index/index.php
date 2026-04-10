<?php

use App\Enums\ProjectRole;
use App\Models\Project;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {

    use WithPagination;

    public ?string $role = null;

    public function setRole(?string $role): void
    {
        $this->role = $role;
    }

    #[Computed]
    public function projects()
    {
        return Project::query()
            ->when($this->role, function ($query) {
                $query->withAnyTags([$this->role], 'main');
            })
            ->active()
            ->latest()
            ->paginate(6);
    }

    #[Computed]
    public function roles(): Collection
    {
        return collect(ProjectRole::cases());
    }


    public function render()
    {
        return $this->view()
            ->title(__('ui.pages.work'))
            ->layout('layouts::app');
    }
};
