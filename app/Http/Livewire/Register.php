<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public User $User;
    public $passwordd;

    protected $rules = [
        'User.name' => 'required|min:5',
        'User.email'     => 'required|email',
        'passwordd' => 'required',
    ];

    public function mount(User $User)
    {
        $this->User = $User ?? new User();
    }

    public function save()
    {
        $this->validate();

        $this->User->password = bcrypt($this->passwordd);
        $this->User->save();
        
        return redirect()->route('login.index');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
