<?php

namespace App\Http\Livewire\Frontend\News;

use App\Models\News;
use App\Traits\NewsRepositoryTrait;
use Livewire\Component;
use Livewire\WithPagination;

class ListNews extends Component
{
    use NewsRepositoryTrait, WithPagination;

    public function render()
    {
        return view('livewire.frontend.news.list-news', [
            'news' => $this->getAllNews()
        ])->layout('layouts.frontend.frontend');
    }
}
