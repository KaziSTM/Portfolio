<?php


use Livewire\Component;

new
class extends Component {


    public function render()
    {
        return $this->view()
            ->title(__('ui.pages.home'))
            ->layout('layouts::app');
    }
};
