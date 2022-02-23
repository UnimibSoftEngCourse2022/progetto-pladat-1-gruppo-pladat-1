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

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $email = $request->input('email');
        $password = $request->input('password');
        /*
        if(Auth::attempt(['email' => $email, 'password' => $password])){
                $request->session()->regenerate();
                $request->put('email', $request->input('email'));
                return response()->view('login');
        }
        */

        $counter = User::all()
            ->where('email', $email)
            ->where('password', $password)
            ->count();
        if($counter == 0){
            $request->session()->regenerate();
                $request->put('email', $request->input('email'));
                return response("Login Success");
        }
        return response('Non sei registrato'); 
    }
}
