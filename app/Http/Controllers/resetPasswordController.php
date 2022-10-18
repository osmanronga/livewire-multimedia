<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class resetPasswordController extends Controller
{
    
    public function __invoke()
    {
        $token = $_REQUEST['token'];
        $email = $_REQUEST['email'];

        $tokens = DB::table('password_resets')->where([['email',$email],['token',$token]])->first();
        
        if($tokens){
            return view('auth-user.reset_password',compact('tokens'));
        }else{
            return 'your data invalid';
        }
    }

}
