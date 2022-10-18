<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $form = [
        'email'   => '',
        'password'=> '',
    ];

    public function save()
    {
        $this->validate([
            'form.email'    => 'required|email',
            'form.password' => 'required',
        ]);

        // dd($this->form);
        Auth::attempt($this->form);
        return redirect()->route('voice.index');
        return redirect(route('voice'));
    }
    
    public function render()
    {
        return view('livewire.login');
    }
}
