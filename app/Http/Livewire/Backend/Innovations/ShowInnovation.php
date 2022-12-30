<?php

namespace App\Http\Livewire\Backend\Innovations;

use App\Models\Innovations;
use Livewire\Component;

class ShowInnovation extends Component
{
    public $inovasi;

    public function mount(Innovations $innovation)
    {
        $this->inovasi = $innovation;
    }

    public function render()
    {
        return view('livewire.backend.innovations.show-innovation')->layout('layouts.backend.app');
    }
}
