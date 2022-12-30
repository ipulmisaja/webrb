@section('title', 'Edit Informasi Inovasi')

<div>
    <main id="main">
        <section class="breadcrumbs" style="margin-top:0!important">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Edit Inovasi {{ $judul }}</h2>
                    <ol>
                        <li>
                            <a href="{{ url(env('APP_URL') . 'backend/innovations/index') }}">Inovasi</a>
                        </li>
                        <li>
                            <a>Edit Inovasi</a>
                        </li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="inner-page">
            <div class="container">
                <form wire:submit.prevent="update">
                    <div class="card border rounded">
                        <div class="card-body">

                            {{-- Tanggal Entri --}}
                            @include('components.input.date', [
                                'title' => 'Tanggal Entri Inovasi',
                                'model' => 'tanggal_entri'
                            ])

                            {{-- Judul Inovasi --}}
                            @include('components.input.text', [
                                'title' => 'Judul Inovasi',
                                'model' => 'judul'
                            ])

                            {{-- Thumbnail --}}
                            @include('components.input.thumbnail', [
                                'title' => 'Thumbnail / Sampul Inovasi',
                                'model' => 'thumbnail'
                            ])

                            {{-- Deskripsi Inovasi --}}
                            @include('components.input.trix', [
                                'title' => 'Deskripsi Inovasi',
                                'model' => 'deskripsi'
                            ])

                            {{-- Keadaan Sebelum Ada Inovasi --}}
                            @include('components.input.trix', [
                                'title' => 'Keadaan Sebelum Ada Inovasi',
                                'model' => 'sebelum_inovasi'
                            ])

                            {{-- Keadaan Setelah Ada Inovasi --}}
                            @include('components.input.trix', [
                                'title' => 'Keadaan Setelah Ada Inovasi',
                                'model' => 'setelah_inovasi'
                            ])

                            {{-- Output --}}
                            @include('components.input.trix', [
                                'title' => 'Output',
                                'model' => 'output'
                            ])

                            {{-- Outcome --}}
                            @include('components.input.trix', [
                                'title' => 'Outcome',
                                'model' => 'outcome'
                            ])

                            {{-- Dampak Terhadap Kinerja Organisasi --}}
                            @include('components.input.trix', [
                                'title' => 'Dampak Terhadap Kinerja Organisasi',
                                'model' => 'dampak_kinerja'
                            ])

                            {{-- URL/Link Aplikasi --}}
                            @include('components.input.text', [
                                'title'  => 'URL/Link Aplikasi',
                                'model'  => 'tautan_aplikasi',
                                'option' => true
                            ])

                            {{-- URL/Link Video --}}
                            @include('components.input.text', [
                                'title'  => 'URL/Link Video (Youtube)',
                                'model'  => 'tautan_video',
                                'option' => true
                            ])

                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">
                                    Foto Dokumentasi Kegiatan/Screenshoot Aplikasi (Maksimal 10)
                                </label>
                                <div class="col-12 col-md-9 col-lg-9">
                                    <div class="card border rounded">
                                        <div class="card-header bg-light">
                                            <h4>
                                                <button wire:click.prevent="addImageSource" class="btn btn-onepage">
                                                    <i class='bx bx-list-plus'></i>
                                                    <small class="ml-1 font-weight-bold">Tambah Dokumentasi</small>
                                                </button>
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <th>Unggah Gambar</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    @foreach ($documentationLists as $index => $documentationItem)
                                                        <tr>
                                                            <td>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class="bx bx-image-add"></i>
                                                                        </div>
                                                                    </div>
                                                                    <input wire:model="documentationLists.{{ $index }}.url" type="file" class="form-control">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button wire:click.prevent="deleteImageSource({{ $index }})" class="btn btn-icon icon-left btn-danger">
                                                                    <i class="bx bx-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            {{-- Tanggal Implementasi --}}
                            @include('components.input.date', [
                                'title' => 'Tanggal Implementasi Inovasi',
                                'model' => 'tanggal_implementasi'
                            ])

                            {{-- Nama Inovator --}}
                            @include('components.input.text', [
                                'title' => 'Nama Inovator',
                                'model' => 'nama_inovator'
                            ])

                            {{-- No. HP Inovator --}}
                            @include('components.input.text', [
                                'title' => 'No. HP Inovator (yang Aktif)',
                                'model' => 'no_hp'
                            ])

                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">
                                    Nama Co-Inovator
                                    <sup class="p-1 bg-info rounded text-white">opsional</sup>
                                </label>
                                <div class="col-12 col-md-9 col-lg-9">
                                    <div class="card border rounded">
                                        <div class="card-header bg-light">
                                            <h4>
                                                <button wire:click.prevent="addCoInovatorList" class="btn btn-onepage">
                                                    <i class='bx bx-list-plus'></i>
                                                    <small class="ml-1 font-weight-bold">Tambah Co-Inovator</small>
                                                </button>
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <th>Entri Nama Co-Inovator</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    @foreach ($coInovatorLists as $index => $coInovatorItem)
                                                        <tr>
                                                            <td>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class='bx bxs-user-plus'></i>
                                                                        </div>
                                                                    </div>
                                                                    <input wire:model="coInovatorLists.{{ $index }}.url" type="text" class="form-control">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button wire:click.prevent="deleteCoInovatorList({{ $index }})" class="btn btn-icon icon-left btn-danger">
                                                                    <i class="bx bx-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            {{-- Lomba yang Pernah Diikuti --}}
                            @include('components.input.trix', [
                                'title' => 'Lomba yang Pernah Diikuti Inovasi Ini',
                                'model' => 'lomba'
                            ])

                            {{-- Replikasi --}}
                            @include('components.input.trix', [
                                'title' => 'Yang Sudah Mereplikasi Inovasi Ini',
                                'model' => 'replikasi'
                            ])

                            {{-- Tujuan --}}
                            @include('components.input.trix', [
                                'title' => 'Tujuan Inovasi<br><small>Gambarkan/jelaskan tujuan munculnya inovasi ini.<br><b>(Maks. 200 kata)</b></small>',
                                'model' => 'tujuan'
                            ])

                            {{-- Signifikansi --}}
                            @include('components.input.trix', [
                                'title'  => 'Signifikansi (Arti Penting)<br><small>Penjelasan :<br>1. Inovasi tersebut harus berdampak positif terhadap kelompok-kelompok penduduk, termasuk kelompok yang rentan (yaitu anak-anak, perempuan, orang tua, orang cacat, dll.) dalam konteks negara atau wilayah Anda;<br>2. Jelaskan bagaimana inovasi ini berperan penting dalam mengatasi kekurangan/kelemahan tata kelola, administrasi umum atau pelayanan publik di wilayah Anda.<br><b>(Maksimal 200 kata)</b></small>',
                                'model'  => 'signifikansi',
                                'height' => '300'
                            ])

                            {{-- Inovatif --}}
                            @include('components.input.trix', [
                                'title'  => 'Inovatif (Kebaruan/Keunikan/Keaslian)<br><small>Penjelasan : <br>1. Jelaskan apakah inovasi ini asli atau merupakan adaptasi/modifikasi/replikasi dari konteks lain.<br>2. Jelaskan sisi inovatif dari inovasi ini dalam konteks wilayah anda.<br><b>(Maksimal 200 kata)</b></small>',
                                'model'  => 'inovatif',
                                'height' => '180'
                            ])

                            {{-- Transferabilitas --}}
                            @include('components.input.trix', [
                                'title'  => 'Transferabilitas (Dapat Diterapkan Pada Tempat Lain)<br><small>Penjelasan : <br>1. Apakah inovasi tersebut memiliki potensi dan/atau terbukti telah diterapkan dan diadaptasi (disesuaikan) ke dalam konteks lain (misalnya wilayah atau unit lain)<br>2. Jika YA, jelaskan di mana dan bagaimana prosesnya.<br><b>(Maksimal 100 kata)</b></small>',
                                'model'  => 'transferabilitas',
                                'height' => '230'
                            ])

                            {{-- Sumber Daya --}}
                            @include('components.input.trix', [
                                'title'  => 'Sumber Daya<br><small>Penjelasan : <br>1. Sumber daya apa (yaitu keuangan, manusia atau lainnya) yang digunakan untuk melaksanakan inovasi tersebut?<br>2. Langkah-langkah/strategi apa yang dilakukan dalam memobilisasi/menggerakkan seluruh sumber daya internal maupun eksternal?<br>3. Apakah hingga saat ini sumber daya masih tersedia?<br><b>(Maksimal 100 kata)</b></small>',
                                'model'  => 'sumber_daya',
                                'height' => '300'
                            ])

                            {{-- Dampak --}}
                            @include('components.input.trix', [
                                'title'  => 'Dampak<br><small>Penjelasan : <br>1. Apakah inovasi ini telah dievaluasi secara resmi skala dampaknya, melalui evaluasi internal atau eksternal, misalnya evaluasi yang dilakukan oleh APIP atau lembaga lain yang relevan.<br>2. Jika YA, jelaskan bagaimana inovasi ini dievaluasi dampaknya pada:<br>  - Target/kelompok sasaran;<br>  - Kelompok masyarakat di luar kelompok sasaran;<br>  - Aspek tata pemerintahan instansi (misalnya efisiensi anggaran; perbaikan proses bisnis; kolaborasi antarsatuan unit kerja/perangkat daerah dan/atau pemangku kepentingan lainnya; tingkat akuntabilitas).<br><b>(Maksimal 100 kata)</b></small>',
                                'model'  => 'dampak',
                                'height' => '420'
                            ])

                            {{-- Stakeholder --}}
                            @include('components.input.trix', [
                                'title'  => 'Keterlibatan Pemangku Kepentingan<br><small>Penjelasan : <br>Jelaskan pemangku kepentingan mana yang terlibat, dan apa peran dan kontribusi mereka dalam merancang, melaksanakan, dan mengevaluasi inovasi ini.<br><b>(Maksimal 200 kata)</b></small>',
                                'model'  => 'stakeholder',
                                'height' => '190'
                            ])

                            {{-- Pelajaran Yang Dipetik --}}
                            @include('components.input.trix', [
                                'title'  => 'Pelajaran yang Dipetik<br><small>Penjelasan :<br>Gambarkan pelajaran apa yang dipetik, serta usulan ide agar inovasi ini dapat ditingkatkan lebih lanjut atau gambarkan kekhususan inovasi yang membuat inovasi ini luar biasa yang membawa perubahan yang lebih cepat dan lebih luas.<br><b>(Maksimal 100 kata)</b></small>',
                                'model'  => 'pelajaran',
                                'height' => '200'
                            ])

                            {{-- Platform --}}
                            @include('components.input.trix', [
                                'title'  => 'Platform yang Digunakan<br><small>Penjelasan :<br>1. Pilih jenis platform yang digunakan jika terdapat aplikasi yang dikembangkan terkait dengan inovasi ini.<br>2. Kosongkan jika tidak terdapat aplikasi yang dikembangkan.<br><br><b>Web<br>Desktop<br>Android<br>IOS</b></small>',
                                'model'  => 'platform',
                                'height' => '250'
                            ])

                            {{-- Git --}}
                            @include('components.input.text', [
                                'title'  => 'Tautan Git<br><small>Penjelasan :<br>Isikan repositori Git jika ada.</small>',
                                'model'  => 'tautan_git',
                                'option' => 'opsional',
                                'height' => '80'
                            ])

                            {{-- SOP --}}
                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">
                                    <div class="mb-2">
                                        SOP Inovasi
                                        <sup class="p-1 bg-info rounded text-white">opsional</sup>
                                    </div>
                                    <small class="text-warning"><strong>File PDF</strong></small>
                                </label>
                                <div class="col-12 col-md-9 col-lg-9">
                                    <input wire:model.lazy="sop" type="file" class="form-control mb-2">
                                    @if(!is_null($sop))
                                        <small>
                                            <a href="{{ google_view_image($sop) }}">Unduh Berkas SOP Pada Tautan Ini.</a>
                                        </small>
                                    @endif
                                    @error('sop')
                                        <div class="pt-3">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">
                                    Highlight Inovasi
                                    <sup class="p-1 bg-info rounded text-white">opsional</sup>
                                </label>
                                <div class="col-12 col-md-9 col-lg-9">
                                    <div class="custom-control custom-checkbox">
                                        <input wire:model="highlight" type="checkbox" class="custom-control-input" id="highlight">
                                        <label class="custom-control-label font-weight-light" for="highlight">
                                            {!! $highlight ? 'Inovasi akan di <strong><i>highlight</i></strong>' : 'Inovasi tidak akan di <strong><i>highlight</i></strong>' !!}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            @switch($highlight)
                                @case(true)
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">Urutan Highlight Inovasi</label>
                                        <div class="col-12 col-md-9 col-lg-9">
                                            <select wire:model="orderInnovations" class="form-control">
                                                <option class="font-weight-light" value="none">- Pilih Urutan Inovasi -</option>
                                                <option class="font-weight-light" value="1">1 - Pertama</option>
                                                <option class="font-weight-light" value="2">2 - Kedua</option>
                                                <option class="font-weight-light" value="3">3 - Ketiga</option>
                                                <option class="font-weight-light" value="4">4 - Keempat</option>
                                            </select>
                                        </div>
                                    </div>
                                    @break
                                @default
                            @endswitch

                        </div>
                        <div class="card-footer section-bg">
                            <button class="btn btn-onepage float-right">
                                <i class="bx bx-save"></i>
                                <span class="ml-1">Perbaharui</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</div>
