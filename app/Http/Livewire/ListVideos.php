<?php

namespace App\Http\Livewire;

use App\Models\video;
use Livewire\Component;

class ListVideos extends Component
{
    public function render()
    {
        $videos = video::paginate(10);

        return view('livewire.list-videos',[
            'videos' => $videos
        ]);
    }
}
