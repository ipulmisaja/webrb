<?php

namespace App\Http\Livewire\Frontend\News;

use App\Models\News;
use Livewire\Component;

class NewsDetail extends Component
{
    public $news;

    public function mount(News $berita)
    {
        $this->news = $berita;
    }

    public function render()
    {
        return view('livewire.frontend.news.news-detail')->layout('layouts.frontend.frontend');
    }
}
