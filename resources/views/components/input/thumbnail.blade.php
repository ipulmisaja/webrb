<div class="form-group row">
    <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">
        <div class="mb-2">{{ $title }}</div>
        <small class="text-warning"><strong>Max. 500 KB, JPG atau PNG</strong></small>
    </label>
    <div class="col-12 col-md-9 col-lg-9">
        <input wire:model.defer="{{ $model }}" type="file" class="form-control mb-2">
        @if (request()->is('backend/news/edit/*') || request()->is('backend/innovations/edit/*'))
            @if($thumbnail)
                <img src="{{ google_thumbnail_image($thumbnail) }}" alt="thumbnail" class="w-25 mt-2 border rounded shadow-sm">
            @endif
        @endif
        @error($model)
            <div class="pt-3">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
    </div>
</div>
<hr>
