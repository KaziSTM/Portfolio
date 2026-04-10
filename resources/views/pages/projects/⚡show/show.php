<?php

use App\Models\Project;
use Livewire\Component;

new class extends Component {

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
            ->title(__('ui.pages.project'))
            ->layout('layouts::app');
    }
};
