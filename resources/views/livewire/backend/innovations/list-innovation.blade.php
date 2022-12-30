@section('title', 'Daftar Inovasi')

<div>
    <main id="main">
        <section class="breadcrumbs" style="margin-top:0!important">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Daftar Inovasi</h2>
                    <ol>
                        <li>Inovasi</li>
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
                                <a href="{{ url(env('APP_URL') . 'backend/innovations/create') }}" class="btn btn-onepage">
                                    <i class='bx bx-list-plus'></i>
                                    <small class="ml-1 font-weight-bold">Tambah Inovasi</small>
                                </a>
                            </h4>
                        </div>
                        <div class="card-body">
                            @include('components.notification.flash')

                            @if ($innovations->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Tanggal & Judul Inovasi</th>
                                            <th>Inovator</th>
                                            <th>Tanggal Implementasi</th>
                                            <th>Aksi</th>
                                        </tr>

                                        @foreach ($innovations as $innovation)
                                            <tr>
                                                <td>
                                                    <small class="text-muted">
                                                        <i class="bx bxs-calendar-event"></i>
                                                        {{ DateFormat::convertDateTime($innovation->published_at) }}
                                                    </small><br>
                                                    {{ $innovation->judul }}
                                                </td>
                                                <td>{{ $innovation->nama_inovator }}</td>
                                                <td>{{ DateFormat::convertDateTime($innovation->tanggal_implementasi) }}</td>
                                                <td>
                                                    <a href="{{ url(env('APP_URL') . 'backend/innovations/show/' . $innovation->id) }}" class="btn btn-icon btn-warning">
                                                        <i class="bx bx-show"></i>
                                                    </a>
                                                    <a href="{{ url(env('APP_URL') . 'backend/innovations/edit/' . $innovation->id) }}" class="ml-2 btn btn-icon btn-primary">
                                                        <i class="bx bx-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>

                                {{-- Pagination --}}
                                {{ $innovations->paginate(20)->links('vendor.pagination.webrb') }}
                            @else
                                @include('components.notification.not-found', [
                                    'data_height' => 400,
                                    'description' => "Maaf, kami tidak dapat menemukan data apapun, " .
                                                    "untuk menghilangkan pesan ini, tambah setidaknya 1 inovasi."
                                ])
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
