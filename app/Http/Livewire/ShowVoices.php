<?php

namespace App\Http\Livewire;

use App\Models\voice;
use App\Models\comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShowVoices extends Component
{

    public $voice;
    public comment $comment;
    public $all_comment;

    protected $rules = [
        'comment.comment' => 'required|min:5',
        // 'comment.commentable_type' => 'string',
        // 'comment.commentable_id' => 'integer',
    ];

    public function mount(comment $comment,voice $voice)
    {
        $this->comment = $comment ?? new comment();
        $this->voice = $voice;
        $this->all_comment = comment::with('user')->where([['commentable_type','App\Models\voice'],['commentable_id',$this->voice->id]])->get();
    }

    public function addComment()
    {
        $this->validate();

        $this->comment->commentable_type = 'App\Models\voice';
        $this->comment->commentable_id = $this->voice->id;
        $this->comment->user_id = Auth::user()->id;

        $this->comment->save();

        return redirect('voice/'.$this->voice->id);
    }

    public function render()
    {
        return view('livewire.show-voices');
    }
}
