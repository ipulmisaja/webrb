<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'user_id',
        'judul_berita',
        'thumbnail',
        'deskripsi',
        'folder_id_gambar',
        'gambar',
        'video',
        'output',
        'outcome',
        'top_order',
        'area',
        'tampil',
        'published_at'
    ];

    protected $casts = [
        'gambar'  => 'array',
        'video'   => 'array'
    ];

    public function userRelationship()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
