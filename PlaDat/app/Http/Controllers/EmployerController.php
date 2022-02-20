<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployerController extends Controller
{
    /*
         * Modifica del profilo eccetto la email.
         *
         */
    function update(Request $request){
        /*
        * Appena ho la sessione funzionante la prendo da quella la email da modificare
        */
        $email = $request->session()->get('email');
        $name = $request->input('name');
        $description = $request->input('description');
        $address = $request->input('address');

        DB::table('employer')->where('email', $email)->update([
            'name' => $name,
            'description'=>$description,
            'address'=>$address,
        ]);

        return redirect()->route('profile')->with(['message'=> 'Updated Account']);
    }

    function delete(Request $request){

        /*
         * Prelevo la email dalla sessione
         * Successivamente elimino le chiavi esterne e poi l'elemento.
         */
        try {
            $email = $request->session()->get('email');
            DB::table('placement')->where('employer_email', $email)->delete();
            DB::table('employer')->where('email', $email)->delete();
        }catch(ModelNotFoundException){
            return redirect()->route('profile');
        }
        return redirect()->route('home');
    }

    /*
     * Questo metodo si occupa della modifica del placement.
     * Preleva i dati dal form e va a modificare il db.
     */
    function updatePlacement(Request $request){

        $email = $request->session()->get('email');
        DB::table('placement')->where('email', $email)->update([
           'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'duration'=>$request->get('duration'),
            'start_date'=>$request->get('start_date'),
            'expiration_date'=>$request->get('expiration_date'),
            'start_placement'=>$request->get('start_placement'),
            'salary'=>$request->get('salary'),
        ]);

        return redirect()->route('profile');
    }

    /*
     * Questo metodo si occuperà di eliminare il placement
     */


}
