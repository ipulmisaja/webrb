@section('title', 'Daftar Berita')

<main id="main">
    <section class="breadcrumbs" style="margin-top:0!important">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Daftar Berita</h2>
                <ol>
                    <li>Berita</li>
                </ol>
            </div>
        </div>
    </section>
    <section class="inner-page">
        <div class="container">
            <div class="section-body">
                <div class="card border rounded">
                    <div class="card-header">
                        <h4>
                            <a href="{{ url(env('APP_URL') . 'backend/news/create') }}" class="btn btn-onepage">
                                <i class='bx bx-list-plus'></i>
                                <small class="ml-1 font-weight-bold">Tambah Berita</small>
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        @include('components.notification.flash')

                        @if ($news->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>Judul Berita</th>
                                        <th>Sorot Berita / <i>(Highlight)</i></th>
                                        <th>Tayang</th>
                                        <th>Aksi</th>
                                    </tr>

                                    @foreach ($news->paginate(20) as $newsItem)
                                        <tr>
                                            <td width="50%">
                                                <small class="text-muted">
                                                    <i class="bx bxs-calendar-event"></i>
                                                    {{ DateFormat::convertDateTime($newsItem->created_at) }}, &nbsp;
                                                    <i class="icofont-folder"></i>
                                                    @include('components.usecase.area', ['data' => $newsItem->area])
                                                </small><br>
                                                {{ $newsItem->judul_berita }}
                                            </td>
                                            <td>
                                                {{ !is_null($newsItem->top_order) ? 'Urutan Ke - ' . $newsItem->top_order : '-' }}
                                            </td>
                                            <td>
                                                <div class="badge {{ $newsItem->has_publish ? 'badge-info' : 'badge-warning' }}">
                                                    {{ $newsItem->has_publish ? 'Tayang' : 'Belum Tayang' }}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ url(env('APP_URL') . 'backend/news/show/' . $newsItem->id) }}" class="btn btn-icon btn-warning">
                                                    <i class="bx bx-show"></i>
                                                </a>
                                                <a href="{{ url(env('APP_URL') . 'backend/news/edit/' . $newsItem->id) }}" class="ml-2 btn btn-icon btn-info">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            {{-- Pagination --}}
                            {{ $news->paginate(20)->links('vendor.pagination.webrb') }}
                        @else
                            @include('components.notification.not-found', [
                                'data_height' => 400,
                                'description' => "Maaf, kami tidak dapat menemukan data apapun, " .
                                                "untuk menghilangkan pesan ini, tambah setidaknya 1 berita."
                            ])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
