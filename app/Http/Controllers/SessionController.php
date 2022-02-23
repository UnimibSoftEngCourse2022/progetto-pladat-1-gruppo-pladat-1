<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function dataSession(Request $request){

        
        $session = array(
            'email'=>$request->session()->get('email'), 
            'type'=>$request->session()->get('type')
        );

        return response($session);

    }
}
