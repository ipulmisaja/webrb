<?php

namespace App\Traits;

trait NewsValidation
{
    public function validation(string $stage)
    {
        if($stage === 'edit') {
            $this->validate([
                'judulBerita' => 'required|string|min:5',
                'thumbnail'   => 'nullable|image|mimes:jpg,png,jpeg|max:500',
                'deskripsi'   => 'required',
                'area'        => 'required',
                'tampil'      => 'required'
            ]);
        } else {
            $this->validate([
                'judulBerita' => 'required|string|min:5',
                'thumbnail'   => 'required|image|mimes:jpg,png,jpeg|max:500',
                'deskripsi'   => 'required',
                'area'        => 'required',
                'tampil'      => 'required'
            ]);
        }
    }
}
