@section('title', $news->judul_berita)

<div class="main-content">
    <main id="main">
        <section class="breadcrumbs" style="margin-top:100px!important">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Berita Reformasi Birokrasi</h2>
                    <ol>
                        <li>
                            <a href="{{ url(env('APP_URL') . '/') }}">Beranda</a>
                        </li>
                        <li>
                            <a href="{{ url(env('APP_URL') . 'berita/') }}">Berita</a>
                        </li>
                        <li>{{ $news->id }}</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="inner-page">
            <div class="container">
                <p class="h4">{{ $news->judul_berita }}</p>
                <small>
                    <i class="icofont-calendar"></i>
                    <span class="ml-1">
                        {{ DateFormat::convertDateTime($news->published_at) }}
                    </span>
                </small>
                <article class="mt-4 text-justify">
                    <p style="text-align: center">
                        <img src="{{ google_view_image($news->thumbnail) }}" alt="thumbnail" class="w-75 mb-2 border p-1 rounded shadow-sm">
                    </p>
                    <div class="description">
                        {!! $news->deskripsi !!}
                    </div>
                    <div class="news-footer d-flex justify-content-between mt-3">
                        <small>
                            <i class="icofont-user-alt-4"></i>
                            <span class="ml-1">Diberitakan Oleh : {{ $news->userRelationship->nama }}</span>
                        </small>
                        <small>
                            <i class="icofont-folder"></i>
                            <span class="ml-1">Pada Area :
                                @include('components.usecase.area', [
                                    'data' => $news->area
                                ])
                            </span>
                        </small>
                    </div>
                </article>
                <section class="-mt-4">
                    @if (count(array_filter($news->gambar)) > 0)
                        <div class="picture">
                            <p class="h6 font-weight-bold">Galeri Gambar : </p>
                            <div class="d-flex flex-wrap">
                                @foreach ($news->gambar as $index => $picture)
                                    <img
                                        src="{{ google_view_image($picture) }}"
                                        alt="news-gallery"
                                        width="150"
                                        class="shadow-sm border rounded p-1 {{ $index == 0 ? 'mr-2' : 'mx-2' }}"
                                        data-aos="zoom-in"
                                        data-aos-delay="200">
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if (count(array_filter($news->video)) > 0)
                        <div class="video mt-4">
                            <p class="h6 font-weight-bold">Galeri Video : </p>
                            <div class="d-flex flex-wrap">
                                @foreach ($news->video as $index => $video)
                                    <a
                                        href="{{ $video['url'] }}"
                                        class="glightbox"
                                        data-aos="zoom-in"
                                        data-aos-delay="200">
                                        <img
                                            src="{{ google_video_thumbnail(explode("v=", $video['url'])[1], 'mqdefault.jpg') }}"
                                            alt="youtube-thumbnail"
                                            class="border rounded shadow-sm p-1 mr-2">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </section>
            </div>
          </section>
    </main>
</div>
