<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Student;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /*
     * Questo metodo si occupa dell'inserimento dei dati per la
     * registrazione di uno student
     */
    public function StudentRegistration(Request $request){

        /*
         * I dati verranno valutati prima di essere inviati
         */

        $student = Student::create($request->all());
        $student->save();
        return response($student, 200);
    }

    /*
     * Questo metodo si occupa dell'inserimento dei dati per la
     * registrazione di un employer
     */
    public function EmployerRegistration(Request $request){
        /*
         * I dati verranno valutati prima di essere inviati
         */
        $employer = Employer::create($request->all());
        $employer->save();
        return response($employer, 200);
    }

}
