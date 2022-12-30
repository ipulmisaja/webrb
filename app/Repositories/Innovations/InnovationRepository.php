<?php

namespace App\Repositories\Innovations;

use App\Models\Innovations;
use App\Traits\GDriveUploadable;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InnovationRepository
{
    use GDriveUploadable;

    public function store($data) : string
    {
        try {
            DB::beginTransaction();

            $thumbnailPath = !is_null($data->thumbnail)
                ? $this->uploadFile(env('GOOGLE_DRIVE_FOLDER_THUMBINNOVATION'), 'create', $data->thumbnail)
                : null;

            $documentationPath = count(array_filter($data->documentationLists)) > 0
                ? $this->uploadFile(env('GOOGLE_DRIVE_FOLDER_GALLERYINNOVATION'), 'create', $data->documentationLists)
                : null;

            $sopPath = !is_null($data->sop)
                ? $this->uploadFile(env('GOOGLE_DRIVE_FOLDER_SOPINNOVATION'), 'create', $data->sop)
                : null;

            Innovations::create([
                'user_id'               => Auth::user()->id,
                'judul'                 => $data->judul,
                'thumbnail'             => $thumbnailPath,
                'deskripsi'             => $data->deskripsi,
                'sebelum_inovasi'       => $data->sebelum_inovasi,
                'setelah_inovasi'       => $data->setelah_inovasi,
                'output'                => $data->output,
                'outcome'               => $data->outcome,
                'dampak_kinerja'        => $data->dampak_kinerja,
                'tautan_aplikasi'       => $data->tautan_aplikasi,
                'tautan_video'          => $data->tautan_video,
                'folder_id_dokumentasi' => is_null($documentationPath) ? null : $documentationPath['folderId'],
                'dokumentasi'           => is_null($documentationPath) ? null : $documentationPath['contents'],
                'tanggal_implementasi'  => Carbon::parse($data->tanggal_implementasi, 'UTC'),
                'nama_inovator'         => $data->nama_inovator,
                'nomor_hp_inovator'     => $data->no_hp,
                'nama_koinovator'       => $data->coInovatorLists,
                'lomba'                 => $data->lomba,
                'replikasi'             => $data->replikasi,
                'tujuan'                => $data->tujuan,
                'signifikansi'          => $data->signifikansi,
                'inovatif'              => $data->inovatif,
                'transferabilitas'      => $data->transferabilitas,
                'sumber_daya'           => $data->sumber_daya,
                'dampak'                => $data->dampak,
                'stakeholder'           => $data->stakeholder,
                'pelajaran'             => $data->pelajaran,
                'platform'              => $data->platform,
                'tautan_git'            => $data->tautan_git,
                'sop'                   => !is_null($sopPath) ? $sopPath : null,
                'top_order'             => $data->orderInnovations ?? null,
                'published_at'          => Carbon::parse($data->tanggal_entri, 'UTC')
            ]);

            $message = "Informasi inovasi telah disimpan.";

            DB::commit();
        } catch(Exception $error) {
            DB::rollBack();

            is_null($thumbnailPath) ?: $this->deleteFile($thumbnailPath);

            is_null($documentationPath['folderId']) ?: $this->deleteDirectory($documentationPath['folderId']);

            is_null($sopPath) ?: $this->deleteFile($sopPath);

            Log::alert($error->getMessage());

            $message = "Informasi inovasi gagal disimpan.";
        }

        return $message;
    }

    public function update($data) : string
    {
        try {
            DB::beginTransaction();

            $thumbnailPath = !is_null($data->thumbnail)
                ? $this->uploadFile(env('GOOGLE_DRIVE_FOLDER_THUMBINNOVATION'), 'update', $data->thumbnail)
                : null;

            # FIXME: illegal string offset 'url'
            // $documentationPath = count(array_filter($data->documentationLists)) > 0
            //     ? $this->uploadFile(env('GOOGLE_DRIVE_FOLDER_GALLERYINNOVATION'), $data->documentationLists)
            //     : null;

            $sopPath = !is_null($data->sop)
                ? $this->uploadFile(env('GOOGLE_DRIVE_FOLDER_SOPINNOVATION'), 'update', $data->sop)
                : null;

            $data->innovation->update([
                'user_id'              => Auth::user()->id,
                'judul'                => $data->judul,
                'thumbnail'            => is_null($thumbnailPath) ? $data->oldThumbnail : $thumbnailPath['basename'],
                'deskripsi'            => $data->deskripsi,
                'sebelum_inovasi'      => $data->sebelum_inovasi,
                'setelah_inovasi'      => $data->setelah_inovasi,
                'output'               => $data->output,
                'outcome'              => $data->outcome,
                'dampak_kinerja'       => $data->dampak_kinerja,
                'tautan_aplikasi'      => $data->tautan_aplikasi,
                'tautan_video'         => $data->tautan_video,
                // 'dokumentasi'          => $documentationPath,
                'tanggal_implementasi' => Carbon::parse($data->tanggal_implementasi, 'UTC'),
                'nama_inovator'        => $data->nama_inovator,
                'nomor_hp_inovator'    => $data->no_hp,
                // 'nama_koinovator'      => $data->coInovatorLists,
                'lomba'                => $data->lomba,
                'replikasi'            => $data->replikasi,
                'tujuan'               => $data->tujuan,
                'signifikansi'         => $data->signifikansi,
                'inovatif'             => $data->inovatif,
                'transferabilitas'     => $data->transferabilitas,
                'sumber_daya'          => $data->sumber_daya,
                'dampak'               => $data->dampak,
                'stakeholder'          => $data->stakeholder,
                'pelajaran'            => $data->pelajaran,
                'platform'             => $data->platform,
                'tautan_git'           => $data->tautan_git,
                'sop'                  => is_null($sopPath) ? $data->oldSop : $sopPath['basename'],
                'top_order'            => $data->orderInnovations ?? null
            ]);

            is_null($thumbnailPath) ?: $this->deleteFile($data->oldThumbnail);

            is_null($sopPath) ?: $this->deleteFile($data->oldSop);

            $message = "Informasi inovasi telah diperbaharui.";

            DB::commit();
        } catch(Exception $error) {
            DB::rollBack();

            is_null($thumbnailPath) ?: $this->deleteFile($thumbnailPath['basename']);

            Log::alert($error->getMessage());

            $message = "Informasi inovasi gagal diperbaharui.";
        }

        return $message;
    }
}
