<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ResetPassword extends Component
{
    public $tokens; 
    public $User;
    public $passwordd;
    public $email;

    protected $rules = [
        'email'     => 'email',
        'passwordd' => 'required',
    ];

    public function mount()
    {
        // $this->tokens = $tokens;
        // dd($this->tokens);
        $this->email = $this->tokens;
        // dd($this->email);
        $this->User = User::where('email',$this->tokens)->first();
    }

    public function save()
    {
       
        $this->validate();
        // dd($this->validate());
        $this->User->password = bcrypt($this->passwordd);
        $this->User->save();
        
        return redirect()->route('login.index');
    }

    public function render()
    {
        return view('livewire.reset-password');
    }
}
