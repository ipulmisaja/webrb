@section('title', 'Selamat Datang')

<div class="main-content">
    @include('components.layout.frontend.hero')

    <main id="main">
        {{-- Inovasi --}}
        @if ($daftarSorotInovasi->count() > 0)
        <section id="innovations" class="innovations">
            <div class="container" data-aos="fade-up">
                <div class="section-title"><h2>Inovasi Unggulan</h2></div>
                <div class="row content">
                    @foreach ($highlightInnovations as $item)
                        <a href="{{ url(env('APP_URL') . 'inovasi/' . session('zona') . '/' . $item->id) }}" class="col-12 col-md-3 col-lg-3 text-dark" data-aos="fade-up" data-aos-delay="300">
                            <div class="card border-0 shadow-sm w-100 section-bg">
                                <img class="card-img-top" src="{{ google_thumbnail_image($item->thumbnail) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ \Illuminate\Support\Str::limit($item->judul, 20) }}</h5>
                                    <p class="card-text">{{ strip_tags(\Illuminate\Support\Str::limit($item->deskripsi, 100)) }}</p>
                                    <div class="d-flex justify-content-between">
                                        <small class="text-muted">{{ date('d/m/Y', strtotime(explode(" ", $item->published_at)[0])) }}</small>
                                        <small class="text-muted">{{ $item->userRelationship->name }}</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ url(env('APP_URL') . 'inovasi/' . session('zona')) }}" class="mt-4 get-started-btn text-center">Selengkapnya</a>
                </div>
            </div>
        </section>
        @else
            <section id="innovations" class="innovations">
                <div class="container" data-aos="fade-up">
                    <div class="section-title"><h2>Inovasi Unggulan</h2></div>
                    <div class="text-center lead h6">Maaf, informasi mengenai inovasi satker tidak ditemukan.</div>
                </div>
            </section>
        @endif

        {{-- Berita --}}
        @if ($daftarSorotBerita->count() > 0)
            <section id="news" class="news section-bg">
                <div class="container" data-aos="fade-up">
                    <div class="section-title"><h2>Sorot Berita</h2></div>
                    <div class="row">
                        @foreach ($daftarSorotBerita as $item)
                            <a href="{{ url(env('APP_URL') . 'berita/' . $item->id) }}" class="col-12 col-md-3 col-lg-3 text-dark" data-aos="fade-up" data-aos-delay="300">
                                <div class="card border-0 shadow-sm w-100">
                                    <img class="card-img-top" src="{{ google_thumbnail_image($item->thumbnail) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ \Illuminate\Support\Str::limit($item->judul_berita, 20) }}</h5>
                                        <p class="card-text text-justify">{{ strip_tags(\Illuminate\Support\Str::limit($item->deskripsi, 120)) }}</p>
                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">{{ date('d/m/Y', strtotime(explode(" ", $item->published_at)[0]))}}</small>
                                            <small class="text-muted">{{ $item->userRelationship->nama }}</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="mt-4 text-center">
                        <a href="{{ url(env('APP_URL') . 'berita/' . session('zona')) }}" class="get-started-btn mt-4 text-center">Selengkapnya</a>
                    </div>
                </div>
            </section>
        @else
            <section id="innovations" class="innovations">
                <div class="container" data-aos="fade-up">
                    <div class="section-title"><h2>Sorot Berita</h2></div>
                    <div class="text-center lead h6">Maaf, informasi mengenai berita satker tidak ditemukan.</div>
                </div>
            </section>
        @endif

        {{-- Video RB Section --}}
        <section id="about-video" class="about-video">
            <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 video-box align-self-baseline aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ google_video_thumbnail('Q2gCHgz3kCc', 'hqdefault.jpg') }}" class="w-100" alt="">
                        <a href="https://www.youtube.com/watch?v=Q2gCHgz3kCc" class="glightbox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                    </div>
                    <div class="col-lg-6 pt-3 pt-lg-0 content aos-init aos-animate" data-aos="fade-left" data-aos-delay="100">
                        <h3>PRIDE SULBAR<br>Data Berkualitas Untuk Sulbar Malaqbi</h3>
                        <p class="fst-italic text-justify">
                            Pride Sulbar merupakan sebuah platform yang mengintegrasikan antara pembinaan statistik secara daring dan dashboard data.
                            Pride Sulbar menjawab dua hal penting guna membantu pemerintah daerah dalam mengatasi permasalahan terkait dengan data statistik.
                            Platform ini akan menghasilkan dashboard yang mengintegrasikan data BPS dan data statistik sektoral yang dihasilkan OPD,
                            mudah diakses dan terbaharui serta sebagai media utama dalam pembinaan statistik sektoral.
                            Keunggulan platform ini adalah :
                        </p>
                        <ul>
                            <li><i class="bx bx-check-double"></i> Tersedianya pembelajaran daring melalui portal e-learning</li>
                            <li><i class="bx bx-check-double"></i> Tersedianya dashboard data yang terintegrasi</li>
                        </ul>
                        <a href="https://bpsprovsulbar.id/pride" class="get-started-btn mt-4 text-center" target="_blank" style="margin-left: 0!important">Kunjungi Platform Pride Sulbar</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
