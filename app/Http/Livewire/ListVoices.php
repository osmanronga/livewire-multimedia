<?php

namespace App\Http\Livewire;

use App\Models\voice;
use Livewire\Component;

class ListVoices extends Component
{
    public function render()
    {
        $voices = voice::paginate(10);

        return view('livewire.list-voices',[
            'voices' => $voices
        ]);
    }
}
