<div class="main-sidebar sidebar-style-2" tabindex="1" style="overflow: hidden; outline: none;">
    <aside id="sidebar-wrapper">
        {{-- Sidebar title --}}
        <div class="sidebar-brand">
            <a href="{{ url(env('APP_URL') . 'dashboard') }}">Backend RB</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url(env('APP_URL') . 'dashboard') }}">RB</a>
        </div>

        {{-- Menu --}}
        <ul class="sidebar-menu">
            <li>
                <a href="{{ url(env('APP_URL') . 'dashboard') }}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Berita --}}
            <li>
                <a href="{{ url(env('APP_URL') . 'news/index') }}" class="nav-link">
                    <i class="fas fa-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>

            {{-- Galeri --}}
            <li>
                <a href="{{ url(env('APP_URL') . 'innovations/index') }}" class="nav-link">
                    <i class="fas fa-images"></i>
                    <span>Inovasi</span>
                </a>
            </li>

            {{-- Pengaturan Aplikasi --}}
            @if(auth()->user()->hasRole('admin'))
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-user-cog"></i>
                        <span>Pengaturan</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="mt-2">
                            <a href="{{ url(env('APP_URL') . 'setting/user') }}" class="nav-link">User</a>
                        </li>
                        <li class="mt-2">
                            <a href="" class="nav-link">Hak Akses</a>
                        </li>
                        <li class="mt-2">
                            <a href="" class="nav-link">Log Aplikasi</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </aside>
</div>
