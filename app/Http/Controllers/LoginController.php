<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Response;

class LoginController extends Controller
{
    public function homepage(){
        return response()->view('index');
    }

    public function loginForm(){
        return response()->view('login');
    }

    public function loginCheck(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->put('email', $request->input('email'));
            return response()->view('index');
        }
        return response('Non sei registrato'); 
    }
}
