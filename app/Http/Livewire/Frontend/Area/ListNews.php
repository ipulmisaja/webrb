<?php

namespace App\Http\Livewire\Frontend\Area;

use App\Traits\NewsRepositoryTrait;
use Livewire\Component;
use Livewire\WithPagination;

class ListNews extends Component
{
    use NewsRepositoryTrait, WithPagination;

    private $area;

    public function mount($area)
    {
        $this->area = $area;
    }

    public function render()
    {
        return view('livewire.frontend.area.list-news', [
            'daftarBerita' => $this->getNewsByArea($this->getArea($this->area), 20)
        ])->layout('layouts.frontend.frontend');
    }

    private function getArea(string $area)
    {
        $arrayArea = [
            1 => 'manajemen-perubahan',
            2 => 'tata-laksana',
            3 => 'manajemen-sdm',
            4 => 'akuntabilitas-kinerja',
            5 => 'penguatan-pengawasan',
            6 => 'pelayanan-publik'
        ];

        $key = array_search($area, $arrayArea);

        return $key;
    }
}
