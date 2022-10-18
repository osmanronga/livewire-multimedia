<div>
    <form method="POST" wire:submit.prevent="save">
        @csrf
    
        <div class="form-group row">
            {{-- {{ $video }} --}}
            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
    
            <div class="col-md-6">
                <input wire:model="video.title" id="title" type="text"
                       class="form-control @error('video.title') is-invalid @enderror"
                       required autocomplete="title" autofocus>
    
                @error('video.title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    
    
        <div class="form-group row">
            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>
    
            <div class="col-md-6">
                <input wire:model.defer="file" type="file"
                       class="@error('file') is-invalid @enderror">
    
                @error('file')
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
