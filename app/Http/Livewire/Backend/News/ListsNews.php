<?php

namespace App\Http\Livewire\Backend\News;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ListsNews extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.backend.news.lists-news', [
            'news' => News::where('user_id', Auth::user()->id)->get()
        ])->layout('layouts.backend.app');
    }
}
