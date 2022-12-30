<?php

namespace App\Http\Livewire\Frontend\Documentation;

use Livewire\Component;

class Team extends Component
{
    public function render()
    {
        return view('livewire.frontend.documentation.team')->layout('layouts.frontend.frontend');
    }
}
