<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row about-video aos-init aos-animate" id="about-video">
            <div class="col-12 col-md-6 col-lg-6 text-right my-auto pr-4">
                <h1 class="display-1 mb-3">Selamat Datang</h1>
                <h3>Portal Halaman Reformasi Birokrasi<br>@include('components.usecase.unit', ['data' => session('zona')])</h3>
                <div class="float-right">
                    <a href="https://bpsprovsulbar.id/rb/dokumentasi/tim/sulbar" class="btn-get-started scrollto" target="_blank">
                        <i class="icofont-ui-social-link" style="font-size:2em"></i>
                        <span class="ml-2">Lihat Tim Reformasi Birokrasi</span>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="video-box align-self-baseline aos-init aos-animate shadow" data-aos="fade-right" data-aos-delay="100">
                    <img src="{{ google_video_thumbnail('E5EwfNp27kc', 'maxresdefault.jpg') }}" class="w-100" alt="">
                    <a href="https://www.youtube.com/watch?v=E5EwfNp27kc" class="glightbox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                </div>
            </div>
        </div>
        {{-- <div class="text-center">
            <h1>Selamat Datang</h1>
            <h2>Portal Halaman Reformasi Birokrasi @include('components.usecase.unit', ['data' => session('zona')])</h2>
            <div class="d-flex justify-content-center align-items-center"> --}}
                {{-- <a href="#about" class="btn-get-started scrollto">Tentang Kami</a> --}}
                {{-- @switch(session('zona'))
                    @case('sulbar')
                        <a href="https://www.youtube.com/watch?v=E5EwfNp27kc" class="glightbox btn-watch-video btn-get-started scrollto">
                            <i class="icofont-play-alt-2" style="font-size: 2em"></i>
                            <span class="ml-2">Lihat Profil BPS Prov. Sulawesi Barat</span>
                        </a>
                        @break
                    @case('majene')
                        <a href="#" class="glightbox btn-watch-video">
                            <i class="icofont-play-alt-2" style="font-size: 2em"></i>
                            <span class="ml-2">Lihat Profil BPS Kab. Majene</span>
                        </a>
                        @break
                    @case('polman')
                        <a href="#" class="glightbox btn-watch-video">
                            <i class="icofont-play-alt-2" style="font-size: 2em"></i>
                            <span class="ml-2">Lihat Profil BPS Kab. Polewali Mandar</span>
                        </a>
                        @break
                    @case('mamasa')
                        <a href="#" class="glightbox btn-watch-video">
                            <i class="icofont-play-alt-2" style="font-size: 2em"></i>
                            <span class="ml-2">Lihat Profil BPS Kab. Mamasa</span>
                        </a>
                        @break
                    @case('mamuju')
                        <a href="#" class="glightbox btn-watch-video">
                            <i class="icofont-play-alt-2" style="font-size: 2em"></i>
                            <span class="ml-2">Lihat Profil BPS Kab. Mamuju</span>
                        </a>
                        @break
                    @case('pasangkayu')
                        <a href="#" class="glightbox btn-watch-video">
                            <i class="icofont-play-alt-2" style="font-size: 2em"></i>
                            <span class="ml-2">Lihat Profil BPS Kab. Pasangkayu</span>
                        </a>
                        @break
                @endswitch --}}
            {{-- </div>
        </div> --}}
    </div>
</section><!-- End Hero -->

