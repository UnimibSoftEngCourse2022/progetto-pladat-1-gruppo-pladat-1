<?php

namespace App\Http\Controllers;

use App\Models\Req;
use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /*
     * Modifica del profilo eccetto la email.
     *
     */
    function update(Request $request){
         /*
         * Appena ho la sessione funzionante la prendo da quella la email da modificare
        */
        $email = $request->input('email');
        $name = $request->input('name');
        $surname = $request->input('surname');
        $presentation = $request->input('presentation');
        $birth_date = $request->input('birth_date');
        $idPhoto = $request->input('idPhoto');

        Student::where('email', $email)
            ->update(['name' => $name,
                'surname'=>$surname,
                'presentation'=>$presentation,
                'birth_date'=>$birth_date,
                'idPhoto'=>$idPhoto]);

        return redirect()->route('profile')->with(['message'=> 'Updated Account']);
    }

    function delete(Request $request){

        /*
         * Prelevo la email ( potrei farlo anche dalla sessione appena è disponibile )
         * e la cerco nel db.
         * Dato che il metodo findOrFail se non trova nulla solleva un eccezione, la gestisco
         * con il try catch
         */
        try {
            $email = $request->session()->get('email');
            DB::table('student')->where('email', $email)->delete();
            DB::table('request')->where('student_email', $email)->delete();
        }catch(ModelNotFoundException){
            return redirect()->route('profile')->with(['message'=> 'Error']);
        }
        return redirect()->route('home')->with(['message'=> 'Eliminated Account']);
    }

    /*
     * Questo metodo prende i parametri per la creazione della richiesta
     */
    function createRequest(Request $request){

        /*
         * Non posso farlo perchè Models non supporta le chiavi esterne
         */
        try {
            $student_email = $request->input('student_email');
            $idPlacement = $request->input('idPlacement');
            $letter = $request->input('presentation_letter');

            DB::table('request')->insert([
                'idPlacement'=>$idPlacement,
                'presentation_letter'=>$letter,
                'student_email'=>$student_email,
            ]);
            return redirect()->route('home');
        }catch(\Exception){
            return redirect()->route('profile');
        }
    }

    /*
     * Questo metodo prende i parametri per la modifica della richiesta
     */
    function updateRequest(Request $request){

        /*
         * Non posso farlo perchè Models non supporta le chiavi esterne
         */
        try {
            $student_email = $request->input('student_email');
            $idPlacement = $request->input('idPlacement');
            $letter = $request->input('presentation_letter');

            DB::table('request')
                ->select('presentation_letter')
                ->where([
                    'student_email'=>$student_email,
                    'idPlacement'=>$idPlacement,
                ])->update([
                    'presentation_letter'=>$letter,
                ]);
            return redirect()->route('home')->with(['message'=> 'Created Request']);
        }catch(\Exception){
            return redirect()->route('profile')->with(['message'=> 'Somethings was wrong']);
        }
    }
    /*
     * Questo metodo preleva i parametri per l'eliminazione della richiesta
    */
    function deleteRequest(Request $request){
        try {
            $student_email = $request->input('student_email');
            $idPlacement = $request->input('idPlacement');

            DB::table('request')
                ->select('student_email', 'idPlacement')
                ->where([
                    'student_email'=>$student_email,
                    'idPlacement'=>$idPlacement,
                ])->delete([
                    'student_email'=>$student_email,
                    'idPlacement'=>$idPlacement,
                ]);
            return redirect()->route('home')->with(['message'=> 'Created Request']);
        }catch(\Exception){
            return redirect()->route('profile')->with(['message'=> 'Somethings was wrong']);
        }
    }

    /*
     * Questo metodo ritorna una lista delle richieste fatte da un determinato studente
     */
    function requestList(Request $request){

        $student_email = $request->input('student_email');

        $req = DB::table('request')
            ->select('student_email')
            ->where([
                'student_email'=>$student_email,
            ])->get();

        return response($req->jsonSerialize());

    }
}
