<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <img class="logo mr-auto w-25" src="{{ secure_asset(env('APP_URL') . 'public/img/sulbar.webp') }}" alt="logo rb">
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="{{ request()->is('/') ? 'active' : '' }}">
                    <a href="{{ url(env('APP_URL') . '/') }}">Beranda</a>
                </li>
                <li class="{{ request()->is('inovasi') ? 'active' : '' }}">
                    <a href="{{ url(env('APP_URL') . 'inovasi') }}">Inovasi</a>
                </li>
                <li class="drop-down {{ request()->is('area/*') ? 'active' : '' }}">
                    <a href="">Area Perubahan</a>
                    <ul>
                        <li class="{{ request()->is('area/manajemen-perubahan') ? 'active' : '' }}">
                            <a href="{{ url(env('APP_URL') . 'area/manajemen-perubahan') }}">
                                Manajemen Perubahan
                            </a>
                        </li>
                        <li class="{{ request()->is('area/tata-laksana') ? 'active' : '' }}">
                            <a href="{{ url(env('APP_URL') . 'area/tata-laksana') }}">
                                Penataan Tata Laksana
                            </a>
                        </li>
                        <li class="{{ request()->is('area/manajemen-sdm') ? 'active' : '' }}">
                            <a href="{{ url(env('APP_URL') . 'area/manajemen-sdm') }}">
                                Penataan Sistem Manajemen SDM
                            </a>
                        </li>
                        <li class="{{ request()->is('area/akuntabilitas-kinerja') ? 'active' : '' }}">
                            <a href="{{ url(env('APP_URL') . 'area/akuntabilitas-kinerja') }}">
                                Penguatan Akuntabilitas Kinerja
                            </a>
                        </li>
                        <li class="{{ request()->is('area/penguatan-pengawasan') ? 'active' : '' }}">
                            <a href="{{ url(env('APP_URL') . 'area/penguatan-pengawasan') }}">
                                Penguatan Pengawasan
                            </a>
                        </li>
                        <li class="{{ request()->is('area/pelayanan-publik') ? 'active' : '' }}">
                            <a href="{{ url(env('APP_URL') . 'area/pelayanan-publik') }}">
                                Peningkatan Kualitas Pelayanan Publik
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="drop-down">
                    <a href="">Dokumentasi</a>
                    <ul>
                        <li><a href="{{ url(env('APP_URL') . 'dokumentasi/tim') }}">Tim</a></li>
                        <li><a href="#">Rencana Kerja</a></li>
                        <li><a href="#">Monitoring dan Evaluasi</a></li>
                    </ul>
                </li>
                <!--<li class="drop-down">-->
                <!--    <a href="">Tautan</a>-->
                <!--    <ul>-->
                <!--        <li><a href="{{ url(env('APP_URL') . 'site/sulbar') }}">BPS Provinsi Sulawesi Barat</a></li>-->
                <!--        <li><a href="{{ url(env('APP_URL') . 'site/majene') }}">BPS Kabupaten Majene</a></li>-->
                <!--        <li><a href="{{ url(env('APP_URL') . 'site/polman') }}">BPS Kabupaten Polewali Mandar</a></li>-->
                <!--        <li><a href="{{ url(env('APP_URL') . 'site/mamasa') }}">BPS Kabupaten Mamasa</a></li>-->
                <!--        <li><a href="{{ url(env('APP_URL') . 'site/mamuju') }}">BPS Kabupaten Mamuju</a></li>-->
                <!--        <li><a href="{{ url(env('APP_URL') . 'site/pasangkayu') }}">BPS Kabupaten Pasangkayu</a></li>-->
                <!--    </ul>-->
                <!--</li>-->
            </ul>
        </nav><!-- .nav-menu -->
    </div>
</header><!-- End Header -->
