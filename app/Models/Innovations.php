<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Innovations extends Model
{
    protected $table = 'innovation';

    protected $fillable = [
        'user_id',
        'judul',
        'thumbnail',
        'deskripsi',
        'sebelum_inovasi',
        'setelah_inovasi',
        'output',
        'outcome',
        'dampak_kinerja',
        'tautan_aplikasi',
        'tautan_video',
        'folder_id_dokumentasi',
        'dokumentasi',
        'tanggal_implementasi',
        'nama_inovator',
        'nomor_hp_inovator',
        'nama_koinovator',
        'lomba',
        'replikasi',
        'tujuan',
        'signifikansi',
        'inovatif',
        'transferabilitas',
        'sumber_daya',
        'dampak',
        'stakeholder',
        'pelajaran',
        'platform',
        'tautan_git',
        'sop',
        'top_order',
        'published_at'
    ];

    protected $casts = [
        'dokumentasi'     => 'array',
        'nama_koinovator' => 'array'
    ];

    public function userRelationship()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
