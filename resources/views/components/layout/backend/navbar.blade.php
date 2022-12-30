<nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <div class="container">
        <img width="5%" src="{{ secure_asset(env('APP_URL') . 'public/vendor/onepage/img/favicon.png') }}" alt="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->is('backend/dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url(env('APP_URL') . 'backend/dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item {{ request()->is('backend/innovations/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url(env('APP_URL') . 'backend/innovations/index')}}">Inovasi</a>
                </li>
                <li class="nav-item {{ request()->is('backend/news/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url(env('APP_URL') . 'backend/news/index') }}">Berita</a>
                </li>
                @role ('admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pengaturan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">User</a>
                            <a class="dropdown-item" href="#">Hak Akses</a>
                            <a class="dropdown-item" href="">Log Aplikasi</a>
                        </div>
                    </li>
                @endrole
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <div class="d-flex align-items-center justify-content-end">
                        <img alt="image" src="{{ secure_asset(env('APP_URL') . 'vendor/onepage/img/avatar-3.png') }}" class="rounded-circle mr-2" width="6%"/>
                        <a class="dropdown-toggle" href="#" id="logout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @livewire('backend.profile.user-profile')
                        </a>
                        <div class="dropdown-menu mt-3" aria-labelledby="logout" style="left: auto;">
                            @livewire('auth.logout')
                        </div>
                    </div>
                </li>
            </ul>
        </div>


    </div>
</nav>
