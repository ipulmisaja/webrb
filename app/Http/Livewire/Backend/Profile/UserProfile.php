<?php

namespace App\Http\Livewire\Backend\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserProfile extends Component
{
    public function render()
    {
        return view('livewire.backend.profile.user-profile', [
            'nama' => Auth::user()->nama
        ]);
    }
}
