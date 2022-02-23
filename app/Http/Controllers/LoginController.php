<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Response;

class LoginController extends Controller
{
    public function loginCheck(Request $request){

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $email = $request->input('email');
        $password = $request->input('password');
        
        if(Auth::attempt(['email' => $email, 'password' => $password])){
                $request->session()->regenerate();
                return response(1);
        }
        return response(0); 
    }
}
