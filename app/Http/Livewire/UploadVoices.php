<?php

namespace App\Http\Livewire;

use App\Models\voice;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadVoices extends Component
{

    use WithFileUploads;

    public $path;
    public $title;

    public voice $voice;
    public $file;

    protected $rules = [
        'voice.title' => 'required|min:5',
        'file' => 'required|file|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
    ];
    
    public function mount(voice $voice)
    {
        $this->voice = $voice ?? new voice();
    }

    public function save()
    {
        $this->validate();

        $filename = $this->file->store('voices', ['disk' => 'public']);

        $this->voice->path = $filename;
        
        $this->voice->save();
        
        return redirect()->route('voice.index');
    }

    public function render()
    {
        return view('livewire.upload-voices');
    }
}
