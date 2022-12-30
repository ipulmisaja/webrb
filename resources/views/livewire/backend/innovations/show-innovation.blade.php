@section('title', $inovasi->judul)

<div>
    <main id="main">
        <section class="breadcrumbs" style="margin-top:0!important">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ \Illuminate\Support\Str::limit($inovasi->judul, 50) }}</h2>
                    <ol>
                        <li>
                            <a href="{{ url(env('APP_URL') . 'backend/innovations/index') }}">Inovasi</a>
                        </li>
                        <li>Lihat Inovasi</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="inner-page">
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <div class="card border rounded">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-pencil-alt"></i>
                                        <span class="ml-1">Judul Inovasi</span>
                                    </label><br>
                                    <div class="ml-4">{{ $inovasi->judul }}</div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="far fa-image"></i>
                                        <span class="ml-1">Gambar Sampul / Thumbnail</span>
                                    </label><br>
                                    <img
                                        class="ml-4 rounded border p-2 w-25"
                                        src="{{ google_view_image($inovasi->thumbnail) }}">
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Deskripsi Inovasi</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->deskripsi !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Keadaan Sebelum Inovasi Ada</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->sebelum_inovasi !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Keadaan Setelah Inovasi Ada</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->setelah_inovasi !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Output</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->output !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Outcome</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->outcome !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Dampak Terhadap Kinerja Organisasi</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->dampak !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">URL / Link Aplikasi</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{{ $inovasi->tautan_aplikasi ?? '-'}}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Url / Link Video</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{{ $inovasi->tautan_video ?? '-' }}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Dokumentasi</span>
                                    </label><br>
                                    <div class="ml-4 d-flex flex-wrap justify-content-start align-items-center">
                                        @foreach ($inovasi->dokumentasi as $item)
                                            <img src="{{ google_view_image($item) }}" class="w-25 rounded border shadow p-1 ml-2 mb-2">
                                        @endforeach
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Tanggal Implementasi</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{{ DateFormat::convertDateTime($inovasi->tanggal_implementasi) }}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Nama & Nomor Inovator</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{{ $inovasi->nama_inovator . ' - ' . $inovasi->nomor_hp_inovator }}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Nama Co-Inovator</span>
                                    </label><br>
                                    <div class="ml-4">
                                        @if (count(array_filter($inovasi->nama_koinovator)) > 0)
                                            <ol>
                                                @foreach ($inovasi->nama_koinovator as $item)
                                                    <li>$item</li>
                                                @endforeach
                                            </ol>
                                        @else
                                            <p>Tidak ada Co-Inovator</p>
                                        @endif
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Lomba yang pernah diikuti</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->lomba !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Yang sudah mereplikasi inovasi ini</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->replikasi !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Tujuan Inovasi</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->tujuan !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Signifikansi</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->signifikansi !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Inovatif</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->inovatif !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Transferabilitas</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->transferabilitas !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Sumber Daya</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->dampak !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Keterlibatan Pemangku Kepentingan</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->stakeholder !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Pelajaran yang Dipetik</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->pelajaran !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Platform yang Digunakan</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $inovasi->platform !!}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Tautan Git</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{{ $inovasi->tautan_git ?? '-' }}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">SOP Inovasi</span>
                                    </label><br>
                                    <div class="ml-4">
                                        @if (!is_null($inovasi->sop))
                                            <a href="{{ google_view_image($inovasi->sop) }}" target="_blank">Unduh SOP Inovasi</a>
                                        @else
                                            -
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card border rounded">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-sort"></i>
                                        <span class="ml-1">Highlight Inovasi</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>Top Urutan Inovasi : <span class="badge badge-info">{{ $inovasi->top_order ?? '-'}}</span></p>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-calendar"></i>
                                        <span class="ml-1">Tanggal Dipublikasikan</span>
                                    </label><br>
                                    <div class="ml-4">
                                        {{ DateFormat::convertDateTime($inovasi->published_at) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url(env('APP_URL') . 'backend/innovations/edit/' . $inovasi->id) }}" class="mt-3 btn btn-onepage w-100">
                            <i class="fas fa-edit"></i>
                            <span class="ml-1">Edit Inovasi</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
