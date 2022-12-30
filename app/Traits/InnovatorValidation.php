<?php

namespace App\Traits;

trait InnovatorValidation
{
    public function validateForm($currentStep)
    {
        if ($currentStep == 1) {
            $this->validate([
                'tanggal_entri'   => 'required',
                'judul'           => 'required|string|min:5',
                'thumbnail'       => 'nullable|image|mimes:png,jpg,jpeg|max:500',
                'deskripsi'       => 'required|string|min:10',
                'tautan_aplikasi' => 'nullable|string|min:5',
                'tautan_video'    => 'nullable|string|min:5',
            ]);
        } elseif ($currentStep == 2) {
            $this->validate([
                'tanggal_implementasi' => 'required',
                'nama_inovator'        => 'required|string|min:3',
                'no_hp'                => 'required|min:10',
                'coInovatorLists'      => 'nullable',
                'lomba'                => 'required|string|min:3',
                'replikasi'            => 'required|string|min:3',
            ]);
        } elseif ($currentStep == 3) {
            $this->validate([
                'sebelum_inovasi' => 'required|string|min:10',
                'setelah_inovasi' => 'required|string|min:10',
                'output'          => 'required|string|min:5',
                'outcome'         => 'required|string|min:5',
                'dampak_kinerja'  => 'required|string|min:10',
            ]);
        } elseif ($currentStep == 4) {
            $this->validate([
                'tujuan'           => 'required|string|min:5',
                'signifikansi'     => 'required|string|min:5',
                'inovatif'         => 'required|string|min:5',
                'transferabilitas' => 'required|string|min:5',
                'sumber_daya'      => 'required|string|min:5',
                'dampak'           => 'required|string|min:5',
                'stakeholder'      => 'required|string|min:5',
                'pelajaran'        => 'required|string|min:5',
                'platform'         => 'required|string|min:3',
                'tautan_git'       => 'nullable|string|min:3'
            ]);
        }
    }
}
