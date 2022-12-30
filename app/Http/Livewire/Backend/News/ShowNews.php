<?php

namespace App\Http\Livewire\Backend\News;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowNews extends Component
{
    public $news;

    public function mount(News $news)
    {
        $this->news = $news;
    }

    public function render()
    {
        if ($this->news->user_id === Auth::user()->id)
            return view('livewire.backend.news.show-news')->layout('layouts.backend.app');
        else
            return view('livewire.backend.errors.404')->layout('layouts.backend.app');
    }
}
