<?php

namespace App\Http\Livewire\Frontend;


use App\Traits\InnovationRepositoryTrait;
use App\Traits\NewsRepositoryTrait;
use App\Traits\VisitorRepositoryTrait;
use Livewire\Component;

class Index extends Component
{
    use InnovationRepositoryTrait, NewsRepositoryTrait, VisitorRepositoryTrait;

    public function render()
    {
        return view('livewire.frontend.index', [
            'daftarSorotBerita'  => $this->getPublishedNews(),
            'daftarSorotInovasi' => $this->getInnovations(),
            'totalPengunjung'    => $this->getTotalVisitor(),
            'pengunjungHariIni'  => $this->getTodayVisitor(),
            'pengunjungKemarin'  => $this->getYesterdayVisitor()
        ])->layout('layouts.frontend.frontend');
    }




}
