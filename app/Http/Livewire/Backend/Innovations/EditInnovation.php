<?php

namespace App\Http\Livewire\Backend\Innovations;

use App\Models\Innovations;
use App\Repositories\Innovations\InnovationRepository;
use App\Traits\InnovatorValidation;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\WithFileUploads;

class EditInnovation extends Component
{

    use InnovatorValidation, WithFileUploads;

    public $innovation;
    public $judul;
    public $thumbnail;
    public $oldThumbnail;
    public $deskripsi;
    public $sebelum_inovasi;
    public $setelah_inovasi;
    public $output;
    public $outcome;
    public $dampak_kinerja;
    public $tautan_aplikasi;
    public $tautan_video;
    public $documentationLists = [];
    public $tanggal_implementasi;
    public $nama_inovator;
    public $no_hp;
    public $coInovatorLists = [];
    public $lomba;
    public $replikasi;
    public $tujuan;
    public $signifikansi;
    public $inovatif;
    public $transferabilitas;
    public $sumber_daya;
    public $dampak;
    public $stakeholder;
    public $pelajaran;
    public $platform;
    public $tautan_git;
    public $sop;
    public $oldSop;
    public $highlight;
    public $orderInnovations;
    public $tanggal_entri;

    public function mount(Innovations $innovation)
    {
        $this->innovation           = $innovation;
        $this->judul                = $innovation->judul;
        $this->thumbnail            = $innovation->thumbnail;
        $this->deskripsi            = $innovation->deskripsi;
        $this->sebelum_inovasi      = $innovation->sebelum_inovasi;
        $this->setelah_inovasi      = $innovation->setelah_inovasi;
        $this->output               = $innovation->output;
        $this->outcome              = $innovation->outcome;
        $this->dampak_kinerja       = $innovation->dampak_kinerja;
        $this->tautan_aplikasi      = $innovation->tautan_aplikasi;
        $this->tautan_video         = $innovation->tautan_video;
        $this->documentationLists   = $innovation->dokumentasi;
        $this->tanggal_implementasi = date('d-m-Y', strtotime(explode(" ", $innovation->tanggal_implementasi)[0]));
        $this->nama_inovator        = $innovation->nama_inovator;
        $this->no_hp                = $innovation->nomor_hp_inovator;
        $this->coInovatorLists      = $innovation->nama_koinovator;
        $this->lomba                = $innovation->lomba;
        $this->replikasi            = $innovation->replikasi;
        $this->tujuan               = $innovation->tujuan;
        $this->signifikansi         = $innovation->signifikansi;
        $this->inovatif             = $innovation->inovatif;
        $this->transferabilitas     = $innovation->transferabilitas;
        $this->sumber_daya          = $innovation->sumber_daya;
        $this->dampak               = $innovation->dampak;
        $this->stakeholder          = $innovation->stakeholder;
        $this->pelajaran            = $innovation->pelajaran;
        $this->platform             = $innovation->platform;
        $this->tautan_git           = $innovation->tautan_git;
        $this->sop                  = $innovation->sop;
        $this->highlight            = !is_null($innovation->top_order) ? true : false;
        $this->orderInnovations     = $innovation->top_order;
        $this->tanggal_entri        = date('d-m-Y', strtotime(explode(" ", $innovation->published_at)[0]));
        $this->oldThumbnail         = $this->thumbnail;
        $this->oldSop               = $this->sop;
    }

    public function render()
    {
        return view('livewire.backend.innovations.edit-innovation')->layout('layouts.backend.app');
    }

    public function addImageSource()
    {
        count($this->documentationLists) > 5 ?: $this->documentationLists[] = [];
    }

    public function deleteImageSource($index)
    {
        unset($this->documentationLists[$index]);

        array_values($this->documentationLists);
    }

    public function addCoInovatorList()
    {
        $this->coInovatorLists[] = [];
    }

    public function deleteCoInovatorList($index)
    {
        unset($this->coInovatorLists[$index]);

        array_values($this->coInovatorLists);
    }

    public function update(InnovationRepository $innovationRepository) : Redirector
    {
        if (is_string($this->thumbnail)) $this->thumbnail = null;

        if (is_string($this->sop)) $this->sop = null;

        if ($this->highlight === false) $this->orderInnovations = null;

        $this->validation('edit');

        $result = $innovationRepository->update($this);

        session()->flash('message', $result);

        return redirect(env('APP_URL') . 'backend/innovations/index');
    }
}
