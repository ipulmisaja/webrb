@switch($method)
    @case('create')
        <section class="breadcrumbs" style="margin-top:0!important">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ $title }}</h2>
                    <ol>
                        <li>
                            <a href="{{ url(env('APP_URL') . $url) }}">Berita</a>
                        </li>
                        <li>
                            <a>{{ $title }}</a>
                        </li>
                    </ol>
                </div>
            </div>
        </section>
        @break
    @case('edit')
        <section class="breadcrumbs" style="margin-top:0!important">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ $title }}</h2>
                    <ol>
                        <li>
                            <a href="{{ url(env('APP_URL') . $url) }}">Berita</a>
                        </li>
                        <li>
                            <a>{{ $title }}</a>
                        </li>
                    </ol>
                </div>
            </div>
        </section>
        @break
@endswitch


