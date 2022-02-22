<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function homepage(){
        return response()->view('index');
    }

    public function loginCheck(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $data = $request->input('email');

        if(DB::table('student')->join('employer')->where($credentials)->exists()){
            $request->session()->regenerate();
            $request->session()->put('email', $data);
            $request->session()->save();
            return redirect()->route('profile')->with(['message' => 'Login']);
        }

        return redirect()->route('login')->with(['message'=> 'Login']);

    }
}
