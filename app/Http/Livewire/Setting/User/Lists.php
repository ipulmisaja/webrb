<?php

namespace App\Http\Livewire\Setting\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Lists extends Component
{
    use WithPagination;


    public function render()
    {
        return view('livewire.setting.user.lists', [
            'users' => User::orderBy('id')->get()
        ])->layout('layouts.backend.app');
    }
}
