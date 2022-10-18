<div>
    <form method="POST" wire:submit.prevent="sendEmail" style="padding: 20px;">
        @csrf
    
        <div class="form-group row">
            
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
    
            <div class="col-md-6">
                <input wire:model="email" id="email" type="text"
                    class="form-control @error('email') is-invalid @enderror"
                    required autocomplete="email" autofocus>
    
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
        </div>
        <br>
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Email') }}
                </button>
            </div>
        </div>

    </form>
</div>
