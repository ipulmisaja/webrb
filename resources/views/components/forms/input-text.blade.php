<div class="form-group row">
    <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">{!! $title !!}
        @if ($option) <sup class="p-1 bg-info rounded text-white">opsional</sup> @endif
    </label>
    <div class="col-12 col-md-9 col-lg-9">
        <input wire:model.defer="{{ $model }}" type="text" class="form-control font-weight-light" @if(is_null($height)) style="height:{{ $height }}px;overflow-y:auto" @endif>
        @error($model)
            <div class="pt-3">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
    </div>
</div>
