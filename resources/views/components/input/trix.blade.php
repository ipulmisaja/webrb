<div class="form-group row">
    <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">
        {!! $title !!}
        @if(isset($option))
            <sup class="p-1 bg-info rounded text-white font-weight-bold">{{ $option }}</sup>
        @endif
    </label>
    <div class="col-12 col-md-9 col-lg-9">
        <div wire:ignore x-data @trix-blur="$dispatch('change', $event.target.value)">
            <trix-editor wire:model.lazy="{{ $model }}" class="form-textarea font-weight-light" @if(isset($height)) style="height:{{ $height }}px;overflow-y:auto" @endif></trix-editor>
        </div>
        @error($model)
            <div class="pt-3">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
    </div>
</div>
<hr>

@push('scripts')
<script type="text/javascript">
    document.querySelector(".trix-button-group--file-tools").remove();
</script>
@endpush
