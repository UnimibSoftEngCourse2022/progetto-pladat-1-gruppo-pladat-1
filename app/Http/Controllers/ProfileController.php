<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /*
     * Questo metodo si occuperà di modificare i dati dell'utente quando l'utente
     * modificherà anche solo un campo.
     */
    public function updateProfile(){

    }

    /*
     * Questo metodo si occuperà di eliminare i dati dell'utente.
     */
    public function deleteProfile(){

    }

    /*
     * Questo metodo tornerà una lista dei placement a cui l'utente fa riferimento
     */
    public function placementList(Reqeust $request){

        /*
         * Prelevo l'utente relativo alla sessione
         */
        $tmp = $request->session()->get('email');
        /*
         * Questo metodo preleva tutti i placment associati all'employer
         * e li ritorna.
         */
        return DB::table('placement')
            ->where('employer_email', $tmp)
            ->get();
    }

    /*
     * Questo metodo dovrà tornare la pagina del profilo corrispondente della sessione
     */
    public function profileView(Request $request){
        /*
        * l'idea è che venga passata la chiave primaria e venga ritornata
        * la pagina del profilo corrispondente.
        */

        $tmp = $request->session()->get('email');

        if($tmp != null){
            return view('user.profile', [
                'user' => Student::findOrFail($tmp)
            ]);
        }

        return response('qualcosa è andato storto', 404);

    }

    /*
     * Questo metodo si occupa di effettuare il logout dalla sessione corrente
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
