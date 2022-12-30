@section('title', $news->judul_berita)

<div>
    <main id="main">
        <section class="breadcrumbs" style="margin-top:0!important">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ \Illuminate\Support\Str::limit($news->judul_berita, 50) }}</h2>
                    <ol>
                        <li>
                            <a href="{{ url(env('APP_URL') . 'backend/news/index') }}">Berita</a>
                        </li>
                        <li>Lihat Berita</li>
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
                                        <span class="ml-1">Judul Berita</span>
                                    </label><br>
                                    <div class="ml-4">{{ $news->judul_berita }}</div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="far fa-image"></i>
                                        <span class="ml-1">Gambar Sampul / Thumbnail</span>
                                    </label><br>
                                    <img
                                        class="ml-4 rounded border p-2 w-25"
                                        src="{{ google_view_image($news->thumbnail) }}">
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-newspaper"></i>
                                        <span class="ml-1">Deskripsi Berita</span>
                                    </label><br>
                                    <div class="ml-4">
                                        <p>{!! $news->deskripsi !!}</p>
                                    </div>
                                </div>
                                <hr>

                                @if (count(array_filter($news->gambar)))
                                    <div class="form-group">
                                        <label class="font-weight-bold">
                                            <i class="fas fa-images"></i>
                                            <span class="ml-1">Galeri Gambar</span>
                                        </label><br>
                                        <div class="ml-1 row">
                                            @foreach ($news->gambar as $picture)
                                                <img src="{{ \Storage::disk('google')->url($picture) }}" class="ml-4 rounded border p-2 w-25">
                                            @endforeach
                                        </div>
                                    </div>
                                    <hr>
                                @endif

                                @if (count(array_filter($news->video)))
                                    <div class="form-group">
                                        <label class="font-weight-bold">
                                            <i class="fab fa-youtube"></i>
                                            <span class="ml-1">Galeri Video</span>
                                        </label><br>
                                        <div class="ml-1 row">
                                            @foreach ($news->video as $video)
                                                <div class="col-sm text-center">
                                                    <iframe
                                                        class="border rounded p-2 mx-1"
                                                        width="360" height="202.5" src="https://www.youtube.com/embed/{{ explode("v=", $video['url'])[1] }}"
                                                        title="YouTube video player"
                                                        frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe><br>
                                                    <label>{{ $video['url'] }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <hr>
                                @endif

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-user"></i>
                                        <span class="ml-1">Area Berita</span>
                                    </label><br>
                                    <div class="ml-4">
                                        @include('components.usecase.area', ['data' => $news->area])
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-user"></i>
                                        <span class="ml-1">Pembuat Berita</span>
                                    </label><br>
                                    <div class="ml-4">{{ $news->userRelationship->nama }}</div>
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
                                        <span class="ml-1">Highlight Berita</span>
                                    </label><br>
                                    <div class="ml-4">
                                        Top Urutan Berita : <span class="badge badge-info">{{ $news->top_order ?? '-' }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fab fa-cloudversify"></i>
                                        <span class="ml-1">Tayang Pada Website</span>
                                    </label><br>
                                    <div class="ml-4 badge {{ $news->tampil ? 'badge-primary' : 'badge-warning'}}">
                                        {{ $news->tampil ? 'Sudah Tayang' : 'Belum Tayang'}}
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="font-weight-bold">
                                        <i class="fas fa-calendar"></i>
                                        <span class="ml-1">Tanggal Ditayangkan</span>
                                    </label>
                                    <div class="ml-4">
                                        {{
                                            $news->tampil ?
                                                DateFormat::convertDateTime($news->published_at) . ' (' . \Carbon\Carbon::parse($news->published_at)->diffForHumans() . ')' :
                                                '-'
                                        }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ url(env('APP_URL') . 'backend/news/edit/' . $news->id) }}" class="mt-3 btn btn-onepage w-100">
                            <i class="fas fa-edit"></i>
                            <span class="ml-1">Edit Berita</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
