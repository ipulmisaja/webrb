<?php

namespace App\Traits;

use App\Models\News;
use Exception;
use Illuminate\Support\Facades\DB;

trait NewsRepositoryTrait
{
    public function getAllNews()
    {
        return News::get();
    }

    public function getNewsWithTopOrder()
    {
        return News::query()
                -> whereNotNull('top_order')
                -> orderBy('top_order', 'asc')
                -> get();
    }

    public function getPublishedNews()
    {
        return News::query()
                -> where('tampil', true)
                -> whereNotNull('top_order')
                -> orderBy('top_order', 'asc')
                -> get();
    }

    public function getNewsByArea(int $area, int $paginate)
    {
        return News::query()
                -> where('area', $area)
                -> orderBy('published_at', 'desc')
                -> paginate($paginate);
    }

    public function countAllNews()
    {
        return News::query()
                -> count();
    }

    public function countPublishedNews()
    {
        return News::query()
                -> where('tampil', true)
                -> count();
    }

    public function countNewsByArea()
    {
        return News::query()
                -> groupBy('area')
                -> selectRaw('count(*) as total, area')
                -> orderBy('area', 'asc')
                -> get();
    }

    public function storeNews($data)
    {
        try {
            DB::beginTransaction();

            $thumbnailPath = !is_null($data->thumbnail)
                ? $this->uploadFile(env('GOOGLE_DRIVE_THUMBNEWS'), $data->thumbnail)
                : null;

            $daftarGambar = count(array_filter($data->daftarGambar)) > 0
                ? $this->uploadFile(env('GOOGLE_DRIVE_GALLERYNEWS'), $data->daftarGambar)
                : $data->daftarGambar;

            News::create([
                'user_id'      => Auth::user()->id,
                'judul_berita' => $data->judulBerita,
                'thumbnail'    => $thumbnailPath['basename'],
                'deskripsi'    => $data->deskripsi,
                'gambar'       => $data->daftarGambar,
                'video'        => $data->daftarVideo,
                'output'       => $data->output,
                'outcome'      => $data->outcome,
                'top_order'    => $data->urutanBerita ?? null,
                'area'         => $data->area,
                'tampil'       => $data->tampil,
                'published_at' => Carbon::parse($data->tanggalTampil, 'UTC')
            ]);

            $message = "Berita telah disimpan.";

            DB::commit();
        } catch(Exception $error) {
            DB::rollBack();

            is_null($thumbnailPath) ?: $this->deleteFile($thumbnailPath['basename']);

            Log::alert($error->getMessage());

            $message = "Berita gagal disimpan.";
        }

        return $message;
    }

    public function updateNews($data)
    {
        try {
            DB::beginTransaction();

            $thumbnailPath = !is_null($data->thumbnail)
                ? $this->uploadFile(env('GOOGLE_DRIVE_FOLDER_THUMBNEWS'), $data->thumbnail)
                : null;

            $imagesList = count(array_filter($data->imageList)) > 0
                ? $this->uploadFile(env('GOOGLE_DRIVE_FOLDER_GALLERYNEWS'), $data->imageList)
                : $data->currentImageList;

            # FIXME: masalah url illegal string gara2 gambar
            $data->news->update([
                'user_id'      => Auth::user()->id,
                'title'        => $data->title,
                'thumbnail'    => is_null($thumbnailPath) ? $data->oldThumbnail : $thumbnailPath['basename'],
                'description'  => $data->description,
                // 'picture'      => array_push($data->currentImageList, $data->imageList),
                // 'video'        => $data->currentVideoList,
                'before'       => $data->before,
                'after'        => $data->after,
                'output'       => $data->output,
                'outcome'      => $data->outcome,
                'top_order'    => $data->orderNews,
                'area'         => $data->area,
                'has_publish'  => $data->publish,
                'published_at' => Carbon::parse($data->publishDate, 'UTC')
            ]);

            is_null($data->thumbnail) ?: $this->deleteFile($data->oldThumbnail);

            $message = "Berita telah diupdate.";

            DB::commit();
        } catch (Exception $error) {
            DB::rollBack();

            is_null($thumbnailPath) ?: $this->deleteFile($thumbnailPath['basename']);

            Log::alert($error->getMessage());

            $message = "Berita gagal diupdate.";
        }

        return $message;
    }
}
