<?php

namespace App\Http\Livewire;

use DB;

use Storage;
use App\Models\video;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadVideos extends Component
{
    

    use WithFileUploads;

    public $path;
    public $title;

    public video $video;
    public $file;

    protected $rules = [
        'video.title' => 'required|min:5',
        'file' => 'required|file|mimetypes:video/mp4,video/mpeg,video/x-matroska',
    ];

    public function mount(video $video)
    {
        $this->video = $video ?? new video();
    }

    public function save()
    {
        $this->validate();

        $filename = $this->file->store('videos', ['disk' => 'public']);

        $this->video->path = $filename;

        $this->video->save();
        
        return redirect()->route('video.index');
    }


    public function render()
    {
        return view('livewire.upload-videos');
    }
}
