<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
     * Questo metodo si occupa di verificare se la mail e la password sono valide
     * Se sono valide, viene fatto un reindirizzamento alla pagina home, altrimenti
     * si ritorna alla pagina di login.
     *
     */

    public function loginCheck(Request $request){

        /*
         * Da request recuper le credenziali di accesso
         *
         * Validate verifica che siano state inserite e controlla determinati
         * requisiti.
         */
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        /*
         * Questa variabile contiene un valore boolean che fa riferimento alla
         * colonna 'remeber_token'. Se è true la sessione di quell'utente viene mantenuta.
         */
        $remember = $request->input('remember_token');

        /*
         * Il metodo attempt cerca se l'email esiste nel db e in caso confronta la password
         * Se tutto è rispettato viene instanziata una sessione
         */
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }
        /*
         * Se non vengono validate le credenziali lancia un errore
         */
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
