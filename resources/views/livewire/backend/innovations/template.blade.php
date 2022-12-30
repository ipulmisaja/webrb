@section('title', $title)

<div>
    <main id="main">
        @include('components.ui.breadcrumb', [
            'tahapan' => $tahapan,
            'title'   => $title,
            'url'     => 'backend/innovations/index'
        ])

        <section class="inner-page">
            <div class="container">
                <form wire:submit.prevent="{{ $method }}">

                    {{-- Step Satu --}}
                    @if ($stepBerjalan == 1)
                        <div class="step-satu" wire:key="{{ $stepBerjalan }}">
                            <div class="card border rounded">
                                <div class="card-header bg-secondary text-white">
                                    Langkah 1/4 - Penjelasan Umum
                                </div>
                                <div class="card-body">
                                    {{-- Tanggal Entri Inovasi --}}
                                    <x-forms.input-date model='tanggal_entri' title='Tanggal Entri Inovasi' />
                                    <hr>

                                    {{-- Judul Inovasi --}}
                                    <x-forms.input-text model='judul' title='Judul Inovasi' />
                                    <hr>

                                    {{-- Gambar Sampul --}}
                                    <x-forms.image-upload model='thumbnail' title='Thumbnail / Sampul Inovasi' />
                                    <hr>

                                    {{-- Deskripsi Inovasi --}}
                                    <x-forms.text-area model='deskripsi' title='Deksripsi Inovasi' />
                                    <hr>

                                    {{-- URL/Link Inovasi --}}
                                    <x-forms.input-text model='tautan_aplikasi' title='Tautan Aplikasi' option=true />
                                    <hr>

                                    {{-- URL/Link Video --}}
                                    <x-forms.input-text model='tautan_video' title='Tautan Video (Youtube)' option=true />
                                    <hr>

                                    {{-- Foto Dokumentasi --}}
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
                                                                            <input wire:model.defer="documentationLists.{{ $index }}.url" type="file" class="form-control">
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
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Step Dua --}}
                    @if ($stepBerjalan == 2)
                        <div class="step-dua" wire:key="{{ $stepBerjalan }}">
                            <div class="card border rounded">
                                <div class="card-header bg-secondary text-white">
                                    Langkah 2/4 - Implementasi Inovasi
                                </div>
                                <div class="card-body">
                                    {{-- Tanggal Implementasi --}}
                                    <x-forms.input-date model='tanggal_implementasi' title='Tanggal Implementasi Inovasi' />
                                    <hr>

                                    {{-- Nama Inovator --}}
                                    <x-forms.input-text model='nama_inovator' title='Nama Inovator' />
                                    <hr>

                                    {{-- No. HP Inovator --}}
                                    <x-forms.input-text model='no_hp' title='No. HP Inovator (yang Aktif)' />
                                    <hr>

                                    {{-- CoInovator --}}
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
                                                                            <input wire:model.defer="coInovatorLists.{{ $index }}.url" type="text" class="form-control">
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
                                    <x-forms.text-area model='lomba' title='Lomba yang Pernah Diikuti Inovasi Ini' />
                                    <hr>

                                    {{-- Replikasi --}}
                                    <x-forms.text-area model='replikasi' title='Yang Sudah Mereplikasi Inovasi Ini' />
                                    <hr>

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
                                            <input wire:model.defer="sop" type="file" class="form-control mb-2">
                                            @error('sop')
                                                <div class="pt-3">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Step Tiga --}}
                    @if ($stepBerjalan == 3)
                        <div class="step-tiga" wire:key="{{ $stepBerjalan }}">
                            <div class="card border rounded">
                                <div class="card-header bg-secondary text-white">
                                    Langkah 3/4 - Dampak Inovasi
                                </div>
                                <div class="card-body">
                                    {{-- Keadaan Sebelum Ada Inovasi --}}
                                    <x-forms.text-area model='sebelum_inovasi' title='Keadaan Sebelum Ada Inovasi' />
                                    <hr>

                                    {{-- Keadaan Setelah Ada Inovasi --}}
                                    <x-forms.text-area model='setelah_inovasi' title='Keadaan Setelah Ada Inovasi' />
                                    <hr>

                                    {{-- Output --}}
                                    <x-forms.text-area model='output' title='Output' />
                                    <hr>

                                    {{-- Outcome --}}
                                    <x-forms.text-area model='outcome' title='Outcome' />
                                    <hr>

                                    {{-- Dampak Terhadap Kinerja Organisasi --}}
                                    <x-forms.text-area model='dampak_kinerja' title='Dampak Terhadap Kinerja Organisasi' />
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Step Empat --}}
                    @if ($stepBerjalan == 4)
                        <div class="step-empat" wire:key="{{ $stepBerjalan }}">
                            <div class="card border rounded">
                                <div class="card-header bg-secondary text-white">
                                    Langkah 4/4 - Informasi Untuk Sinovik
                                </div>
                                <div class="card-body">
                                    {{-- Tujuan --}}
                                    <x-forms.text-area
                                        model='tujuan'
                                        title='Tujuan Inovasi<br><small>Gambarkan/jelaskan tujuan munculnya inovasi ini.<br><b>(Maks. 200 kata)</b></small>'
                                    />
                                    <hr>

                                    {{-- Signifikansi --}}
                                    <x-forms.text-area
                                        model='signifikansi'
                                        title='Signifikansi (Arti Penting)<br><small>Penjelasan :<br>1. Inovasi tersebut harus berdampak positif terhadap kelompok-kelompok penduduk, termasuk kelompok yang rentan (yaitu anak-anak, perempuan, orang tua, orang cacat, dll.) dalam konteks negara atau wilayah Anda;<br>2. Jelaskan bagaimana inovasi ini berperan penting dalam mengatasi kekurangan/kelemahan tata kelola, administrasi umum atau pelayanan publik di wilayah Anda.<br><b>(Maksimal 200 kata)</b></small>'
                                        height='300'
                                    />
                                    <hr>

                                    {{-- Inovatif --}}
                                    <x-forms.text-area
                                        model='inovatif'
                                        title='Inovatif (Kebaruan/Keunikan/Keaslian)<br><small>Penjelasan : <br>1. Jelaskan apakah inovasi ini asli atau merupakan adaptasi/modifikasi/replikasi dari konteks lain.<br>2. Jelaskan sisi inovatif dari inovasi ini dalam konteks wilayah anda.<br><b>(Maksimal 200 kata)</b></small>'
                                        height='180'
                                    />
                                    <hr>

                                    {{-- Transferabilitas --}}
                                    <x-forms.text-area
                                        model='transferabilitas'
                                        title='Transferabilitas (Dapat Diterapkan Pada Tempat Lain)<br><small>Penjelasan : <br>1. Apakah inovasi tersebut memiliki potensi dan/atau terbukti telah diterapkan dan diadaptasi (disesuaikan) ke dalam konteks lain (misalnya wilayah atau unit lain)<br>2. Jika YA, jelaskan di mana dan bagaimana prosesnya.<br><b>(Maksimal 100 kata)</b></small>'
                                        height='230'
                                    />
                                    <hr>

                                    {{-- Sumber Daya --}}
                                    <x-forms.text-area
                                        model='sumber_daya'
                                        title='Sumber Daya<br><small>Penjelasan : <br>1. Sumber daya apa (yaitu keuangan, manusia atau lainnya) yang digunakan untuk melaksanakan inovasi tersebut?<br>2. Langkah-langkah/strategi apa yang dilakukan dalam memobilisasi/menggerakkan seluruh sumber daya internal maupun eksternal?<br>3. Apakah hingga saat ini sumber daya masih tersedia?<br><b>(Maksimal 100 kata)</b></small>'
                                        height='300'
                                    />
                                    <hr>

                                    {{-- Dampak --}}
                                    <x-forms.text-area
                                        model='dampak'
                                        title='Dampak<br><small>Penjelasan : <br>1. Apakah inovasi ini telah dievaluasi secara resmi skala dampaknya, melalui evaluasi internal atau eksternal, misalnya evaluasi yang dilakukan oleh APIP atau lembaga lain yang relevan.<br>2. Jika YA, jelaskan bagaimana inovasi ini dievaluasi dampaknya pada:<br>  - Target/kelompok sasaran;<br>  - Kelompok masyarakat di luar kelompok sasaran;<br>  - Aspek tata pemerintahan instansi (misalnya efisiensi anggaran; perbaikan proses bisnis; kolaborasi antarsatuan unit kerja/perangkat daerah dan/atau pemangku kepentingan lainnya; tingkat akuntabilitas).<br><b>(Maksimal 100 kata)</b></small>'
                                        height='420'
                                    />
                                    <hr>

                                    {{-- Stakeholder --}}
                                    <x-forms.text-area
                                        model='stakeholder'
                                        title='Keterlibatan Pemangku Kepentingan<br><small>Penjelasan : <br>Jelaskan pemangku kepentingan mana yang terlibat, dan apa peran dan kontribusi mereka dalam merancang, melaksanakan, dan mengevaluasi inovasi ini.<br><b>(Maksimal 200 kata)</b></small>'
                                        height='190'
                                    />
                                    <hr>

                                    {{-- Pelajaran Yang Dipetik --}}
                                    <x-forms.text-area
                                        model='pelajaran'
                                        title='Pelajaran yang Dipetik<br><small>Penjelasan :<br>Gambarkan pelajaran apa yang dipetik, serta usulan ide agar inovasi ini dapat ditingkatkan lebih lanjut atau gambarkan kekhususan inovasi yang membuat inovasi ini luar biasa yang membawa perubahan yang lebih cepat dan lebih luas.<br><b>(Maksimal 100 kata)</b></small>'
                                        height='200'
                                    />
                                    <hr>

                                    {{-- Platform --}}
                                    <x-forms.text-area
                                        model='platform'
                                        title='Platform yang Digunakan<br><small>Penjelasan :<br>1. Pilih jenis platform yang digunakan jika terdapat aplikasi yang dikembangkan terkait dengan inovasi ini.<br>2. Kosongkan jika tidak terdapat aplikasi yang dikembangkan.<br><br><b>Web<br>Desktop<br>Android<br>IOS</b></small>'
                                        height='250'
                                    />
                                    <hr>

                                    {{-- Git --}}
                                    <x-forms.input-text
                                        model='tautan_git'
                                        title='Tautan Git<br><small>Penjelasan :<br>Isikan repositori Git jika ada.</small>'
                                        option=true
                                    />
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
                                                    <select wire:model.defer="orderInnovations" class="form-control">
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
                            </div>
                        </div>
                    @endif

                    <div class="action-buttons mt-2 d-flex justify-content-between bg-white pt-2 pb-2">
                        @if ($stepBerjalan == 1)
                            <div></div>
                        @endif

                        @if ($stepBerjalan == 2 || $stepBerjalan == 3 || $stepBerjalan == 4)
                            <button type="button" class="btn btn-md btn-warning" wire:click="decreaseStep()">
                                <i class="bx bx-skip-previous-circle"></i>
                                <span class="ml-1">Kembali</span>
                            </button>
                        @endif

                        @if ($stepBerjalan == 1 || $stepBerjalan == 2 || $stepBerjalan == 3)
                            <button type="button" class="btn btn-md btn-info" wire:click="increaseStep()">
                                <span class="mr-1">Selanjutnya</span>
                                <i class="bx bx-skip-next-circle"></i>
                            </button>
                        @endif

                        @if ($stepBerjalan == 4)
                            <button type="submit" class="btn btn-md btn-onepage">
                                <i class='bx bx-save'></i>
                                <span class="ml-1">Simpan</span>
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </section>
    </main>
</div>
