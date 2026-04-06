<?php

use App\Models\Project;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('View project')]
class extends Component {

    public Project $project;

    public function mount(int $projectId): void
    {
        $this->project = Project::query()
            ->withRelations()
            ->with('testimonials')
            ->where('id', $projectId)
            ->firstOrFail();
    }

    public function render()
    {
        return $this->view()
            ->layout('layouts::app');
    }
};
