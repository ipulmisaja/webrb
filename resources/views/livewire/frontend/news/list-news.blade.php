@section('title', 'Daftar Berita')

<div class="main-content">
    <main id="main">
        <section class="breadcrumbs" style="margin-top:100px!important">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Daftar Berita Reformasi Birokrasi</h2>
                    <ol>
                        <li><a href="{{ url(env('APP_URL') . 'site/' . session('zona')) }}">Beranda</a></li>
                        <li>Berita</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="inner-page">
            <div class="container">
                @foreach ($news as $item)
                    <a
                        href="{{ url(env('APP_URL') . 'berita/' . session('zona') . '/' . $item->id) }}" class="text-dark"
                        onmouseover="this.style.color='#2487ce'"
                        onmouseout="this.style.color='inherit'">
                        <div class="d-flex mb-4">
                            <img src="{{ google_thumbnail_image($item->thumbnail) }}" class="w-25 border rounded p-1" alt="image">
                            <div class="ml-3">
                                <p class="h5">{{ $item->title }}</p>
                                <article class="text-justify">
                                    <div class="description">{{ strip_tags(\Illuminate\Support\Str::limit($item->description, 200)) }}</div>
                                </article>
                                <div class="mt-2 d-flex justify-content-between">
                                    <small>
                                        <i class="icofont-calendar"></i>
                                        <span class="ml-1">
                                            {{ DateFormat::convertDateTime($item->published_at) }}
                                        </span>
                                    </small>
                                    <small>
                                        <i class="icofont-folder"></i>
                                        <span class="ml-1">
                                            @include('components.usecase.area', [
                                                'data' => $item->area
                                            ])
                                        </span>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                {{ $news->links('vendor.pagination.bootstrap-4') }}
            </div>
        </section>
    </main>
</div>
