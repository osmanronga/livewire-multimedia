<div>
    <form method="POST" wire:submit.prevent="save">
        @csrf
    
        <div class="form-group row mb-1">
            
            <input wire:model="email" id="email" type="hidden"
                       class="form-control @error('email') is-invalid @enderror"
                       required >

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
