@section('title', $innovation->judul)

<div class="main-content">
    <main class="main">
        <section class="breadcrumbs" style="margin-top:100px!important">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Detail Informasi Inovasi</h2>
                    <ol>
                        <li>
                            <a href="{{ url(env('APP_URL') . 'site/' . session('zona')) }}">Beranda</a>
                        </li>
                        <li>
                            <a href="{{ url(env('APP_URL') . 'inovasi/' . session('zona')) }}">Inovasi</a>
                        </li>
                        <li>{{ $innovation->id }}</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="inner-page">
            <div class="container">
                <div class="d-flex justify-content-between mb-3">
                    <small class="font-weight-bold">
                        <i class="icofont-user-alt-4"></i>
                        <span class="ml-1">{{ $innovation->userRelationship->nama }}</span>
                    </small>
                    <small>
                        <i class="icofont-calendar"></i>
                        <span class="ml-1">{{ DateFormat::convertDateTime($innovation->published_at) }}</span>
                    </small>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <td class="w-25">Nama Inovasi</td>
                        <td>{{ $innovation->judul }}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Deskripsi Inovasi</td>
                        <td class="text-justify">{!! $innovation->deskripsi !!}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Keadaan Sebelum Ada Inovasi</td>
                        <td class="text-justify">{!! $innovation->sebelum_inovasi !!}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Keadaan Setelah Ada Inovasi</td>
                        <td class="text-justify">{!! $innovation->setelah_inovasi !!}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Output</td>
                        <td class="text-justify">{!! $innovation->output !!}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Outcome</td>
                        <td class="text-justify">{!! $innovation->outcome !!}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Dampak Terhadap Kinerja Organisasi</td>
                        <td class="text-justify">{!! $innovation->dampak_kinerja !!}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Tautan Aplikasi</td>
                        <td class="text-justify">
                            @if (is_null($innovation->tautan_aplikasi))
                                -
                            @else
                                <a href="{{ $innovation->tautan_aplikasi }}" target="_blank">{{ $innovation->tautan_aplikasi }}</a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="w-25">Tautan Video</td>
                        <td class="text-justify">
                            @if (is_null($innovation->tautan_video))
                                -
                            @else
                                <a href="{{ $innovation->tautan_video }}" class="d-flex align-items-center glightbox btn-watch-video text-dark">
                                    <i class="icofont-play-alt-2" style="font-size: 2em"></i>
                                    <span class="ml-2">Putar Video</span>
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="w-25">Foto Dokumentasi Kegiatan / Screenshot Aplikasi</td>
                        <td>
                            <div class="d-flex flex-wrap">
                                @foreach ($innovation->dokumentasi as $index => $picture)
                                    <img src="{{ google_view_image($picture) }}" class="w-25 border rounded p-1 @if($index > 0) ml-2 @endif" alt="image">
                                @endforeach
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
    </main>
</div>
