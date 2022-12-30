<?php

namespace App\Repositories\News;

use App\Models\News;
use App\Traits\GDriveUploadable;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsRepository
{
    use GDriveUploadable;

    public function store($data) : string
    {
        try {
            DB::beginTransaction();

            $thumbFileName = !is_null($data->thumbnail)
                ? $this->uploadFile(env('GOOGLE_DRIVE_FOLDER_THUMBNEWS'), 'create', $data->thumbnail)
                : null;

            $imagesList = count(array_filter($data->daftarGambar)) > 0
                ? $this->uploadFile(env('GOOGLE_DRIVE_FOLDER_GALLERYNEWS'), 'create', $data->daftarGambar)
                : $data->daftarGambar;

            News::create([
                'user_id'          => Auth::user()->id,
                'judul_berita'     => $data->judulBerita,
                'thumbnail'        => $thumbFileName,
                'deskripsi'        => $data->deskripsi,
                'folder_id_gambar' => is_null($imagesList) ? null : $imagesList['folderId'],
                'gambar'           => is_null($imagesList) ? null : $imagesList['contents'],
                'video'            => $data->daftarVideo,
                'output'           => $data->output,
                'outcome'          => $data->outcome,
                'top_order'        => $data->urutanBerita ?? null,
                'area'             => $data->area,
                'tampil'           => $data->tampil,
                'published_at'     => Carbon::parse($data->tanggalTampil, 'UTC')
            ]);

            $message = "Berita telah disimpan.";

            DB::commit();
        } catch(Exception $error) {
            DB::rollBack();

            is_null($thumbFileName) ?: $this->deleteFile($thumbFileName);

            Log::alert($error->getMessage());

            $message = "Berita gagal disimpan.";
        }

        return $message;
    }

    public function update($data) : string
    {
        try {
            DB::beginTransaction();

            $thumbFileName = !is_null($data->thumbnail)
                ? $this->uploadFile(env('GOOGLE_DRIVE_FOLDER_THUMBNEWS'), 'update', $data->thumbnail)
                : null;

            $diffGambar = array_diff(array_filter($data->news->gambar), array_filter($data->daftarGambarAktif));

            if (count($diffGambar) > 0) {
                for ($i = 0; $i < count($diffGambar); $i++) {
                    $this->deleteFile($diffGambar[$i]);
                }
            }

            $imagesList = count(array_filter($data->daftarGambar)) > 0
                ? $this->uploadFile($data->folderIdGambar, 'update', $data->daftarGambar)
                : $data->daftarGambarAktif;

            $data->news->update([
                'user_id'      => Auth::user()->id,
                'judul_berita' => $data->judulBerita,
                'thumbnail'    => is_null($thumbFileName) ? $data->thumbnailAktif : $thumbFileName,
                'deskripsi'    => $data->deskripsi,
                'gambar'       => $imagesList,
                'video'        => $data->daftarVideo,
                'output'       => $data->output,
                'outcome'      => $data->outcome,
                'top_order'    => $data->urutanBerita ?? null,
                'area'         => $data->area,
                'tampil'       => $data->tampil,
                'published_at' => Carbon::parse($data->tanggalTampil, 'UTC')
            ]);

            is_null($data->thumbnail) ?: $this->deleteFile($data->thumbnailAktif);

            $message = "Berita telah diupdate.";

            DB::commit();
        } catch(Exception $error) {
            DB::rollBack();

            is_null($thumbFileName) ?: $this->deleteFile($thumbFileName);

            Log::alert($error->getMessage());

            $message = "Berita gagal diupdate.";
        }

        return $message;
    }
}
