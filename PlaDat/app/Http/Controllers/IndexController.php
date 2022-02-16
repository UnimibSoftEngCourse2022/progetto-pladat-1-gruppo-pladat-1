<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /*
     * Questo metodo ritornerà la pagina di login
     */
    public function loginPage(){
        return view('loginPage');
    }

    /*
     * Questo metodo ritornerà la pagina contenente il form di registrazione
     */
    public function registationPage(){
        return view('registrationPage');
    }
}
