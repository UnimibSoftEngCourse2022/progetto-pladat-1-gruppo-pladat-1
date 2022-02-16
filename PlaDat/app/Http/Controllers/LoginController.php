<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
     * Questo metodo si occupa di verificare se la mail e la password sono valide
     * Se sono valide, viene fatto un reindirizzamento alla pagina home, altrimenti
     * si ritorna alla pagina di login.
     *
     * NB. capire se è meglio ritornare un boolean, controllato da javascript. In questo modo
     * farei una nuova richiesta get al nuovo indirizzo, chiamando i metodi specifici.
     *
     */
    public function loginCheck(){
        /*
         * if(!(Employer/Student.counterEmail == 0 && Employer/Student.checkEmail))
         *      return view('loginPage')
         * return view('home');
         *
         */

    }

    /*
     * Questo metodo si occupa di ritornare la pagina di registrazione nel caso in cui venga
     * schiacciato il tasto "registrati"
     */
    public function registationPage(){
        return view('registrationPage');
    }

    /*
     * Questo metodo tornerà la pagina del profilo quando il login ha avuto esito positivo
     */
    public function profilePage(){
        return view('profilePage');
    }
}
