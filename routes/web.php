<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Backend\Dashboard\ShowDashboard;
use App\Http\Livewire\Backend\Innovations\CreateEditInnovation;
use App\Http\Livewire\Backend\Innovations\ListInnovation as BackendListInnovation;
use App\Http\Livewire\Backend\Innovations\ShowInnovation;
use App\Http\Livewire\Backend\News\CreateEditNews;
use App\Http\Livewire\Backend\News\ListsNews as BackendListNews;
use App\Http\Livewire\Backend\News\ShowNews;
use App\Http\Livewire\Frontend\Area\ListNews as FrontNewsArea;
use App\Http\Livewire\Frontend\Documentation\Team;
use App\Http\Livewire\Frontend\Index;
use App\Http\Livewire\Frontend\Innovations\InnovationDetail;
use App\Http\Livewire\Frontend\Innovations\ListInnovation as FrontendListInnovation;
use App\Http\Livewire\Frontend\News\ListNews as FrontListNews;
use App\Http\Livewire\Frontend\News\NewsDetail;
use App\Http\Livewire\Setting\User\Create;
use App\Http\Livewire\Setting\User\Lists;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class);
Route::get('area/{area}', FrontNewsArea::class);
Route::get('inovasi', FrontendListInnovation::class);
Route::get('inovasi/{inovasi}', InnovationDetail::class);
Route::get('berita', FrontListNews::class);
Route::get('berita/{berita}', NewsDetail::class);
Route::get('dokumentasi/tim', Team::class);

Route::middleware('guest')->group(function() {
    Route::get('login', Login::class);
});

Route::middleware('auth')->prefix('backend')->group(function() {
    Route::get('dashboard', ShowDashboard::class);

    Route::prefix('news')->group(function() {
        Route::get('index',  BackendListNews::class);
        Route::get('create', CreateEditNews::class);
        Route::get('edit/{news}', CreateEditNews::class);
        Route::get('show/{news}', ShowNews::class);
    });

    Route::prefix('innovations')->group(function() {
        Route::get('index', BackendListInnovation::class);
        Route::get('create', CreateEditInnovation::class);
        Route::get('edit/{innovation}', CreateEditInnovation::class);
        Route::get('show/{innovation}', ShowInnovation::class);
    });

    Route::prefix('setting')->group(function() {
        Route::get('user', Lists::class);
        Route::get('user/create', Create::class);
    });
});
