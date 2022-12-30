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
