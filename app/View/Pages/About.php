<?php

namespace App\View\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.templates.app')]
class About extends Component
{
    public function render()
    {
        return view('pages.about');
    }
}
