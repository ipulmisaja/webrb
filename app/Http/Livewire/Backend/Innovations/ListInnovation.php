<?php

namespace App\Http\Livewire\Backend\Innovations;

use App\Traits\InnovationRepositoryTrait;
use Livewire\Component;
use Livewire\WithPagination;

class ListInnovation extends Component
{
    use InnovationRepositoryTrait, WithPagination;

    public function render()
    {
        return view('livewire.backend.innovations.list-innovation', [
            'innovations' => $this->listInnovations(20)
        ])->layout('layouts.backend.app');
    }
}
