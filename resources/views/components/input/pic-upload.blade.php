<div class="form-group row">
    <label class="col-form-label col-12 col-md-3 col-lg-3">{{ $title }}</label>
    <div class="col-12 col-md-9 col-lg-9">
        <div class="card border rounded">
            <div class="card-header bg-light">
                <h4>
                    <button wire:click.prevent="{{ $method_add }}" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-plus"></i>
                        <span class="ml-1">Tambah</span>
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
                        @foreach ($model as $index => $documentationItem)
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-upload"></i>
                                            </div>
                                        </div>
                                        <input wire:model="{{ $model }}.{{ $index }}.url" type="file" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <button wire:click.prevent="deleteImageSource({{ $index }})" class="btn btn-icon icon-left btn-danger">
                                        <i class="fas fa-trash"></i>
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
