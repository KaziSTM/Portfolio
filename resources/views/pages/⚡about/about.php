<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('About me')]
class extends Component {


    public function render()
    {
        return $this->view()
            ->layout('layouts::app');
    }
};
