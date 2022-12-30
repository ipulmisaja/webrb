@section('title', 'Login')

<div class="card-body">
    <form wire:submit.prevent="login" class="needs-validation">
        <div class="form-group">
            <label for="username">Username</label>
            <input wire:model.defer="username" type="text" class="form-control" tabindex="1" required autofocus>
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <input wire:model.defer="password" type="password" class="form-control" tabindex="2" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        @error('error')
            <div class="my-3 text-center">
                <span class="text-danger font-weight-bold">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <button type="submit" class="btn btn-onepage btn-block" tabindex="4">Login</button>
        </div>
    </form>
</div>
