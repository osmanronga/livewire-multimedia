<div>
    <form method="POST" wire:submit.prevent="save">
        @csrf
    
        <div class="form-group row mb-1">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
            <div class="col-md-6">
                <input wire:model="User.name" id="name" type="text"
                       class="form-control @error('User.name') is-invalid @enderror"
                       required autocomplete="name" autofocus>
    
                @error('User.name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    
    
        <div class="form-group row mb-1">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
    
            <div class="col-md-6">
                <input wire:model="User.email" id="email" type="text"
                       class="form-control @error('User.email') is-invalid @enderror"
                       required autocomplete="email" autofocus>
    
                @error('User.email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="form-group row mb-1">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('password') }}</label>
    
            <div class="col-md-6">
                <input wire:model="passwordd" id="password" type="password"
                       class="form-control @error('passwordd') is-invalid @enderror"
                       required >
    
                @error('passwordd')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

    
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </form>
</div>
