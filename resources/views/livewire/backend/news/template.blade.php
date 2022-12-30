@section('title', $title)

<div>
    <main id="main">
        @include('components.ui.breadcrumb', [
            'method' => $method === 'save' ? 'create' : 'edit',
            'title'  => $title,
            'url'    => 'backend/news/index'
        ])

        <section class="inner-page">
            <div class="container">
                <form wire:submit.prevent="{{ $method }}">
                    <div class="card border rounded">
                        <div class="card-body">

                            {{-- Tanggal Berita --}}
                            <x-forms.input-date model='tanggalBerita' title='Tanggal Berita' />
                            <hr>

                            {{-- Judul Berita --}}
                            <x-forms.input-text model='judulBerita' title='Judul Berita' />

                            {{-- Thumbnail --}}
                            <x-forms.image-upload model='thumbnail' title='Thumbnail / Sampul Berita '/>
                            <hr>

                            {{-- Deskripsi Berita --}}
                            <x-forms.text-area model='deskripsi' title='Deskripsi Berita' />
                            <hr>

                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">
                                    Galeri Gambar
                                    <sup class="p-1 bg-info rounded text-white font-weight-bold">opsional</sup>
                                </label>
                                <div class="col-12 col-md-9 col-lg-9">
                                    <div class="card border rounded">
                                        <div class="card-header bg-light">
                                            <h4>
                                                <button wire:click.prevent="addImageSource" class="btn btn-onepage" @if (count($daftarGambar) > 9) disabled @endif>
                                                    <i class='bx bx-list-plus'></i>
                                                    <small class="ml-1 font-weight-bold">Tambah Galeri</small>
                                                </button>
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                @if ($method === 'update')
                                                    @if (count(array_filter($daftarGambarAktif)) > 0)
                                                        <div class="ml-1 row">
                                                            @foreach ($daftarGambarAktif as $index => $picture)
                                                                <div class="img-wrap">
                                                                    <span wire:click.prevent="deleteCurrentImage({{ $index }})" class="close rounded bg-white" style="cursor: pointer">&times;</span>
                                                                    <img src="{{ \Storage::disk('google')->url($picture) }}" class="rounded {{ $index > 0 ? 'ml-4' : '' }} mb-4" width="100">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                @endif
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <th class="font-weight-light">Unggah Gambar</th>
                                                        <th class="font-weight-light">Aksi</th>
                                                    </tr>
                                                    @foreach ($daftarGambar as $index => $itemGambar)
                                                        <tr>
                                                            <td>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class="bx bx-image-add"></i>
                                                                        </div>
                                                                    </div>
                                                                    <input wire:model.defer="daftarGambar.{{ $index }}.url" type="file" class="form-control">
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

                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">
                                    Galeri Video
                                    <sup class="p-1 bg-info rounded text-white font-weight-bold">opsional</sup>
                                </label>
                                <div class="col-12 col-md-9 col-lg-9">
                                    <div class="card border rounded">
                                        <div class="card-header bg-light">
                                            <h4>
                                                <button wire:click.prevent="addVideoLink" class="btn btn-onepage" @if (count($daftarVideo) > 4) disabled @endif>
                                                    <i class='bx bx-list-plus'></i>
                                                    <small class="ml-1 font-weight-bold">Tambah Video</small>
                                                </button>
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <th class="font-weight-light">Tautan / Link Video</th>
                                                        <th class="font-weight-light">Aksi</th>
                                                    </tr>
                                                    @foreach ($daftarVideo as $index => $itemVideo)
                                                        <tr>
                                                            <td>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class='bx bx-video-plus' ></i>
                                                                        </div>
                                                                    </div>
                                                                    <input wire:model.defer="daftarVideo.{{ $index }}.url" type="text" class="form-control">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button wire:click.prevent="deleteVideoLink({{ $index }})" class="btn btn-icon icon-left btn-danger">
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

                            {{-- Output --}}
                            <x-forms.text-area model='output' title='Output' option='opsional' />
                            <hr>

                            {{-- Outcome --}}
                            <x-forms.text-area model='outcome' title='Outcome' option='opsional' />
                            <hr>

                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">
                                    Highlight Berita
                                </label>
                                <div class="col-12 col-md-9 col-lg-9">
                                    <div class="custom-control custom-checkbox">
                                        <input wire:model="highlight" type="checkbox" class="custom-control-input" id="highlight">
                                        <label class="custom-control-label font-weight-light" for="highlight">
                                            {!! $highlight ? 'Berita akan di <strong><i>highlight</i></strong>' : 'Berita tidak akan di <strong><i>highlight</i></strong>' !!}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            @switch($highlight)
                                @case(true)
                                    <div class="form-group row">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">Urutan Highlight Berita</label>
                                        <div class="col-12 col-md-9 col-lg-9">
                                            <select wire:model.defer="urutanBerita" class="form-control font-weight-light">
                                                <option class="font-weight-light" value="none">- Pilih Urutan Berita -</option>
                                                <option class="font-weight-light" value="1">1 - Pertama</option>
                                                <option class="font-weight-light" value="2">2 - Kedua</option>
                                                <option class="font-weight-light" value="3">3 - Ketiga</option>
                                                <option class="font-weight-light" value="4">4 - Keempat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    @break
                                @default
                            @endswitch

                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">Area Berita</label>
                                <div class="col-12 col-md-9 col-lg-9">
                                    <select wire:model.defer="area" class="form-control font-weight-light">
                                        <option class="font-weight-light" value="none">- Pilih Area Perubahan RB -</option>
                                        <option class="font-weight-light" value="1">Manajemen Perubahan</option>
                                        <option class="font-weight-light" value="2">Penataan Tatalaksana</option>
                                        <option class="font-weight-light" value="3">Manajemen SDM</option>
                                        <option class="font-weight-light" value="4">Penguatan Akuntabilitas</option>
                                        <option class="font-weight-light" value="5">Penguatan Pengawasan</option>
                                        <option class="font-weight-light" value="6">Peningkatan Kualitas Pelayanan Publik</option>
                                    </select>
                                    @error('area')
                                        <div class="pt-3">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">Tayangkan Berita</label>
                                <div class="col-12 col-md-9 col-lg-9">
                                    <div class="custom-control custom-checkbox">
                                        <input wire:model="tampil" type="checkbox" class="custom-control-input" id="show">
                                        <label class="custom-control-label font-weight-light" for="show">{!! $tampil ? 'Berita akan ditayangkan' : 'Berita tidak ditayangkan' !!}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer section-bg">
                            <button class="btn btn-onepage float-right">
                                <i class='bx bx-save'></i>
                                <span class="ml-1">Simpan</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</div>

@push('scripts')
<script>flatpickr('.publishDate')</script>
@endpush
