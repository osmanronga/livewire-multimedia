<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
  
    <h2>{{ $video->title }}</h2>
    <video width="320" height="240" controls>
        <source src="{{asset("storage/".$video->path)}}" type="video/mp4">
      Your browser does not support the video tag.
  </video>

  @guest()

  @else
  
    <hr>
    <b>write Comment</b>
    <div class="row">
        
        <div>
            <form method="POST" wire:submit.prevent="addComment" style="padding: 20px;">
                @csrf
            
                <div class="form-group row">
                    
                    <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>
            
                    <div class="col-md-6">
                        <input wire:model="comment.comment" id="comment" type="text"
                            class="form-control @error('comment.comment') is-invalid @enderror"
                            required autocomplete="comment" autofocus>
            
                        @error('comment.comment')
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
                            {{ __('Comment') }}
                        </button>
                    </div>
                </div>
        
            </form>
        </div>
        
    </div>
  @endguest

  <hr>
  <b>all Comments</b>
  <hr>

  <div>

    @forelse ($all_comment as $all_comment)
        <h2>{{ @$all_comment->user->name }}</h2>
        <p>{{ $all_comment->comment }}</p>    
        <hr>
    @empty
        <h3>no comment found</h3>
    @endforelse
  </div>
</div>
