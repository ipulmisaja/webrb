@section('title', 'Dashboard')

<div>
    <main id="main">
        <section class="breadcrumbs" style="margin-top:0!important">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Dashboard {{ $user }}</h2>
                    <ol>
                        <li>Dashboard</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="inner-page">
            <div class="container">
                {{-- Card Berita --}}
                <div class="row mb-4">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="card border rounded shadow-sm">
                            <div class="card-body text-center">
                                {{-- <i class='bx bx-code-alt font-weight-bold h5 rounded-circle p-3 bg-secondary text-white'></i> --}}
                                <div class="font-weight-bold text-muted mb-3">Jumlah Inovasi yang Dientri</div>
                                <p class="text-info h1">{{ $jumlahInovasi }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="card border rounded shadow-sm">
                            <div class="card-body text-center">
                                <div class="font-weight-bold text-muted mb-3">Jumlah Berita yang Dientri</div>
                                <p class="text-info h1">{{ $jumlahBerita }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="card border rounded shadow-sm">
                            <div class="card-body text-center">
                                <div class="font-weight-bold text-muted mb-3">Jumlah Berita yang Ditayangkan</div>
                                <p class="text-info h1">{{ $tayangBerita }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Berita yang di highlight --}}
                <div class="card border rounded shadow-sm mb-4">
                    <div class="card-header">
                        <span class="font-weight-bold leading">Daftar Sorot Berita / <i>Highlight</i></span>
                    </div>
                    <div class="card-body">
                        @if ($sorotBerita->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Tanggal & Judul Berita</th>
                                    <th>Sorot Berita / <i>(Highlight)</i></th>
                                    <th>Tayang</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($sorotBerita as $item)
                                    <tr>
                                        <td width="50%">
                                            <small class="text-muted">
                                                <i class="bx bxs-calendar-event"></i>
                                                {{ DateFormat::convertDateTime($item->created_at) }}, &nbsp;
                                                <i class="icofont-folder"></i>
                                                @include('components.usecase.area', ['data' => $item->area])
                                            </small><br>
                                            {{ $item->judul_berita }}
                                        </td>
                                        <td>
                                            {{ !is_null($item->top_order) ? 'Urutan Ke - ' . $item->top_order : '-' }}
                                        </td>
                                        <td>
                                            <div class="badge {{ $item->has_publish ? 'badge-info' : 'badge-warning' }}">
                                                {{ $item->has_publish ? 'Tayang' : 'Belum Tayang' }}
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ url(env('APP_URL') . 'backend/news/show/' . $item->id) }}" class="btn btn-icon btn-warning">
                                                <i class="bx bx-show"></i>
                                            </a>
                                            <a href="{{ url(env('APP_URL') . 'backend/news/edit/' . $item->id) }}" class="ml-2 btn btn-icon btn-info">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        @else
                            @include('components.notification.not-found', [
                                'data_height' => 400,
                                'description' => "Maaf, kami tidak dapat menemukan data apapun"
                            ])
                        @endif
                    </div>
                </div>

                {{-- Jumlah Berita per Area --}}
                <div class="card border rounded shadow-sm">
                    <div class="card-header">
                        <span class="font-weight-bold leading">Jumlah Berita Menurut Area</span>
                    </div>
                    <div class="card-body">
                        @if (!is_null($beritaPerArea))
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>No.</th>
                                        <th>Area Perubahan</th>
                                        <th>Jumlah Berita</th>
                                    </tr>
                                    <tr>
                                        <td width="5%">1.</td>
                                        <td>Manajemen Perubahan</td>
                                        <td>
                                            {{
                                                count(\Illuminate\Support\Arr::flatten($beritaPerArea->where('area', 1))) > 0
                                                    ? \Illuminate\Support\Arr::flatten($beritaPerArea->where('area', 1))[0]->total
                                                    : 0
                                            }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="5%">2.</td>
                                        <td>Penataan Tata Laksana</td>
                                        <td>
                                            {{
                                                count(\Illuminate\Support\Arr::flatten($beritaPerArea->where('area', 2))) > 0
                                                    ? \Illuminate\Support\Arr::flatten($beritaPerArea->where('area', 2))[0]->total
                                                    : 0
                                            }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="5%">3.</td>
                                        <td>Penataan Sistem Manajemen SDM</td>
                                        <td>
                                            {{
                                                count(\Illuminate\Support\Arr::flatten($beritaPerArea->where('area', 3))) > 0
                                                    ? \Illuminate\Support\Arr::flatten($beritaPerArea->where('area', 3))[0]->total
                                                    : 0
                                            }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="5%">4.</td>
                                        <td>Penguatan Akuntabilitas Kinerja</td>
                                        <td>
                                            {{
                                                count(\Illuminate\Support\Arr::flatten($beritaPerArea->where('area', 4))) > 0
                                                    ? \Illuminate\Support\Arr::flatten($beritaPerArea->where('area', 4))[0]->total
                                                    : 0
                                            }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="5%">5.</td>
                                        <td>Penguatan Pengawasan</td>
                                        <td>
                                            {{
                                                count(\Illuminate\Support\Arr::flatten($beritaPerArea->where('area', 5))) > 0
                                                    ? \Illuminate\Support\Arr::flatten($beritaPerArea->where('area', 5))[0]->total
                                                    : 0
                                            }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="5%">6.</td>
                                        <td>Peningkatan Kualitas Pelayanan Publik</td>
                                        <td>
                                            {{
                                                count(\Illuminate\Support\Arr::flatten($beritaPerArea->where('area', 6))) > 0
                                                    ? \Illuminate\Support\Arr::flatten($beritaPerArea->where('area', 6))[0]->total
                                                    : 0
                                            }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @else
                            @include('components.notification.not-found', [
                                'data_height' => 400,
                                'description' => "Maaf, kami tidak dapat menemukan data apapun"
                            ])
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
