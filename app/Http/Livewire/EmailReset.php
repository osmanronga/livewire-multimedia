<?php

namespace App\Http\Livewire;

use DB;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Mail\resetPasswordEmail;
use Illuminate\Support\Facades\Mail;


class EmailReset extends Component
{
    public User $User;
    public $email;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
    ];

    

    public function sendEmail()
    {
        $this->validate();

        $user = User::where('email',$this->email)->first();
        
        if (!$user) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }
        
        $token = Str::random(10);

        DB::table('password_resets')->insert([
            'email' => $this->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        
        // $link = config('APP_URL') . 'password/reset/' . $token . '?email=' . urlencode($this->email);
        $detail['link'] = 'http://127.0.0.1:8000/sendPassword?token='.$token.'&email='.$this->email;

        Mail::to($this->email)->send(new resetPasswordEmail($detail));


        return redirect('voice');
    }

    public function render()
    {
        return view('livewire.email-reset');
    }
}
