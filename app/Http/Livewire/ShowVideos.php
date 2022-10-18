<?php

namespace App\Http\Livewire;

use App\Models\video;
use App\Models\comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShowVideos extends Component
{
    public $video;
    public comment $comment;
    public $all_comment;

    protected $rules = [
        'comment.comment' => 'required|min:5',
        // 'comment.commentable_type' => 'string',
        // 'comment.commentable_id' => 'integer',
    ];

    public function render()
    {
        return view('livewire.show-videos');
    }

    public function mount(comment $comment,video $video)
    {
        $this->comment = $comment ?? new comment();
        $this->video = $video;
        $this->all_comment = comment::with('user')->where([['commentable_type','App\Models\video'],['commentable_id',$this->video->id]])->get();
    }

    public function addComment()
    {
        $this->validate();

        $this->comment->commentable_type = 'App\Models\video';
        $this->comment->commentable_id = $this->video->id;
        $this->comment->user_id = Auth::user()->id;

        $this->comment->save();

        return redirect('video/'.$this->video->id);
    }
}
