<?php

namespace App\Http\Livewire\Backend\News;

use App\Models\News;
use App\Repositories\News\NewsRepository;
use App\Traits\NewsValidation;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\WithFileUploads;

class CreateEditNews extends Component
{
    use NewsValidation, WithFileUploads;

    public $judulBerita;
    public $thumbnail;
    public $thumbnailAktif;
    public $deskripsi;
    public $folderIdGambar;
    public $daftarGambar = [];
    public $daftarGambarAktif = [];
    public $daftarVideo = [];
    public $daftarVideoAktif = [];
    public $highlight = false;
    public $output;
    public $outcome;
    public $urutanBerita;
    public $area;
    public $tampil = false;
    public $tanggalBerita;
    public $tanggalTampil;

    public $news;
    public $tahapan;

    public function mount(News $news)
    {
        $this->tahapan = Str::contains(request()->getPathInfo(), 'create')
            ? 'create'
            : 'edit';

        if ($this->tahapan === 'edit') {
            $this->news = $news;

            $this->tanggalBerita     = date('d-m-Y', strtotime(explode(" ", $news->created_at)[0]));
            $this->judulBerita       = $news->judul_berita;
            $this->thumbnail         = $this->thumbnailAktif = $news->thumbnail;
            $this->deskripsi         = $news->deskripsi;
            $this->folderIdGambar    = $news->folder_id_gambar;
            $this->daftarGambarAktif = $news->gambar;
            $this->daftarGambar      = [[]];
            $this->daftarVideo       = $news->video;
            $this->highlight         = !is_null($news->top_order) ? true : false;
            $this->output            = $news->output;
            $this->outcome           = $news->outcome;
            $this->urutanBerita      = $news->top_order;
            $this->area              = $news->area;
            $this->tampil            = $news->tampil;
            $this->tanggalTampil     = date('d-m-Y', strtotime(explode(" ", $news->published_at)[0]));
        } else {
            $this->daftarGambar = [[]];
            $this->daftarVideo = [[]];
        }
    }

    public function render()
    {
        return view('livewire.backend.news.create-edit-news')->layout('layouts.backend.app');
    }

    public function addImageSource()
    {
        count($this->daftarGambar) > 10 ?: $this->daftarGambar[] = [];
    }

    public function deleteImageSource($index)
    {
        unset($this->daftarGambar[$index]);

        array_values($this->daftarGambar);
    }

    public function deleteCurrentImage($index)
    {
        unset($this->daftarGambarAktif[$index]);

        array_values($this->daftarGambarAktif);
    }

    public function addVideoLink()
    {
        count($this->daftarVideo) > 5 ?: $this->daftarVideo[] = [];
    }

    public function deleteVideoLink($index)
    {
        unset($this->daftarVideo[$index]);

        array_values($this->daftarVideo);
    }

    public function save(NewsRepository $newsRepository) : Redirector
    {
        $this->validation('create');

        $result = $newsRepository->store($this);

        session()->flash('message', $result);

        return redirect(env('APP_URL') . 'backend/news/index');
    }

    public function update(NewsRepository $newsRepository) : Redirector
    {
        if (is_string($this->thumbnail)) $this->thumbnail = null;

        if ($this->highlight === false) $this->urutanBerita = null;

        $this->validation('edit');

        $result = $newsRepository->update($this);

        session()->flash('message', $result);

        return redirect(env('APP_URL') . 'backend/news/show/' . $this->news->id);
    }
}
