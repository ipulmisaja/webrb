@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

<div class="form-group row">
    <label class="col-form-label col-12 col-md-3 col-lg-3 font-weight-light">{{ $title }}</label>
    <div class="col-12 col-md-9 col-lg-9">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class='bx bx-calendar'></i>
                </div>
            </div>
            <input wire:model.defer="{{ $model }}" type="text" class="{{ $model }} form-control font-weight-light" ref="input" data-date-format="d-m-Y" style="background-color: transparent!important">
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
    <script>flatpickr('.{{ $model }}')</script>
@endpush
