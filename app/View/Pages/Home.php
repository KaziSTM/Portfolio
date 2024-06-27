<?php

namespace App\View\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.templates.app')]
class Home extends Component
{
    public function render()
    {
        return view('pages.home');
    }
}
