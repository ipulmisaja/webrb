<?php

namespace App\Http\Livewire\Frontend\Innovations;

use App\Models\Innovations;
use Livewire\Component;

class InnovationDetail extends Component
{
    public $innovation;

    public function mount(Innovations $inovasi)
    {
        $this->innovation = $inovasi;
    }

    public function render()
    {
        return view('livewire.frontend.innovations.innovation-detail')->layout('layouts.frontend.frontend');
    }
}
