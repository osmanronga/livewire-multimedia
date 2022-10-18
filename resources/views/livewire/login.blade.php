<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            {{-- <div class="panel-heading">Login</div> --}}
            <br>

            <div class="panel-body">
                <form method="POST" wire:submit.prevent="save">
                    @csrf
                
                    <div class="form-group row mb-1">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                
                        <div class="col-md-6">
                            <input wire:model="form.email" id="email" type="text"
                                   class="form-control @error('form.email') is-invalid @enderror"
                                    autocomplete="email" autofocus>
                
                            @error('form.email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
            
            
                    <div class="form-group row mb-1">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('password') }}</label>
                
                        <div class="col-md-6">
                            <input wire:model="form.password" id="password" type="password"
                                   class="form-control @error('form.password') is-invalid @enderror"
                                    >
                
                            @error('form.password')
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

                    <hr>
                    <br>

                    <a href="{{ url('sendtoken') }}" class="btn btn-info">{{ __('Reset Password') }}</a>
                </form>
            </div>    
        </div>    
    </div>    
</div>    

