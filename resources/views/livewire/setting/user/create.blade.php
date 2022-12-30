@section('title', 'Tambah User')

<div class="main-content">
    <section class="section" style="z-index:0">
        <div class="section-header">
            <p class="h3">Tambahkan User Baru</p>
        </div>

        <div class="section-body">
            <form wire:submit.prevent="save">
                <div class="card border rounded">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">Nama User</div>
                                <div class="col-9">
                                    <input wire:model.lazy="name" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">Alamat Email</div>
                                <div class="col-9">
                                    <input wire:model.lazy="email" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">Hak Akses</div>
                                <div class="col-9">
                                    <select wire:model="role" class="form-control">
                                        <option>- Pilih Hak Akses -</option>
                                        @foreach ($roles as $roleItem)
                                            <option value="{{ $roleItem->name }}">{{ ucfirst($roleItem->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-secondary">
                        <button class="btn btn-icon icon-left btn-primary float-right">
                            <i class="fas fa-save"></i>
                            <span class="ml-1">Simpan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
