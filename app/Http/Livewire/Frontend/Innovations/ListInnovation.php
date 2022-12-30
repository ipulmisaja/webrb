<?php

namespace App\Http\Livewire\Frontend\Innovations;

use App\Traits\InnovationRepositoryTrait;
use Livewire\Component;
use Livewire\WithPagination;

class ListInnovation extends Component
{
    use InnovationRepositoryTrait, WithPagination;

    public function render()
    {
        return view('livewire.frontend.innovations.list-innovation', [
            'daftarInovasi' => $this->listInnovations(20, [
                                'id', 'thumbnail', 'user_id', 'judul', 'deskripsi', 'created_at'
                                ])
        ])->layout('layouts.frontend.frontend');
    }
}
