@section('title', 'Tim Reformasi Birokrasi')

<div class="main-content">
    <main id="main">
        <section class="breadcrumbs" style="margin-top:100px!important">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Tim Reformasi Birokrasi</h2>
                    <ol>
                        <li>
                            <a href="{{ url(env('APP_URL') . 'site/' . session('zona')) }}">Beranda</a>
                        </li>
                        <li>Tim</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="inner-page team">
            <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="section-title">
                    <h2>TIM REFORMASI BIROKRASI</h2>
                    <p>Tim Reformasi Birokrasi BPS Provinsi Sulawesi Barat terdiri dari seorang ketua dan
                        enam koordinator yang bertugas pada masing-masing area perubahan.
                    </p>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4"></div>
                    <div class="col-12 col-md-6 col-lg-4 align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ secure_asset('public/img/tim/agus.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Agus Gede Hendrayana Hermawan</h4>
                                <span>Ketua</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4"></div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ secure_asset('public/img/tim/bakti.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Muh. Nurbakti</h4>
                                <span>Koordinator Area<br>Mental Aparatur dan Manajemen Perubahan</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ secure_asset('public/img/tim/fredy.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Fredy Takaya</h4>
                                <span>Koordinator Area<br>Penguatan Tata Laksana</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ secure_asset('public/img/tim/labi.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>M. La'bi</h4>
                                <span>Koordinator Area<br>Penguatan Sistem Manajemen SDM ASN</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ secure_asset('public/img/tim/jumadi.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Heni Djumadi</h4>
                                <span>Koordinator Area<br>Penguatan Akuntabilitas Kinerja</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ secure_asset('public/img/tim/markus.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Markus Uda</h4>
                                <span>Koordinator Area<br>Penguatan Pengawasan</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ secure_asset('public/img/tim/prayitno.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Prayitno</h4>
                                <span>Koordinator Area<br>Peningkatan Kualitas Pelayanan Publik</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="cta" class="cta">
            <div class="container aos-init aos-animate" data-aos="zoom-in">
                <div class="text-center">
                    <h3>Keputusan Kepala BPS Provinsi Sulawesi Barat No. 015/RB-SDI Tahun 2021</h3>
                    <p>Tentang Tim Pelaksana Reformasi Birokrasi</p>
                    <iframe class="mt-2" src="{{ google_view_image('1oGV_UaqA6JrGdv7EIZeY7kLUS5Y9mOAH') }}" width="100%" height="600px"></iframe>
                </div>
            </div>
        </section>
    </main>
</div>
