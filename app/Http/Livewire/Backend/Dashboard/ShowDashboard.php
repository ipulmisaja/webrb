<?php

namespace App\Http\Livewire\Backend\Dashboard;

use App\Traits\InnovationRepositoryTrait;
use App\Traits\NewsRepositoryTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowDashboard extends Component
{
    use InnovationRepositoryTrait, NewsRepositoryTrait;

    public function render()
    {
        return view('livewire.backend.dashboard.show-dashboard', [
            'user'          => Auth::user()->name,
            'sorotBerita'   => $this->getAllNews(),
            'tayangBerita'  => $this->countPublishedNews(),
            'jumlahBerita'  => $this->countAllNews(),
            'beritaPerArea' => $this->countNewsByArea(),
            'jumlahInovasi' => $this->countInnovations()
        ])->layout('layouts.backend.app');
    }
}
