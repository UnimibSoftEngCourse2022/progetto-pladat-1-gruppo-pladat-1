<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

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
        $email = $request->input('email');
        $name = $request->input('name');
        $description = $request->input('description');
        $address = $request->input('address');

        Student::where('email', $email)
            ->update([
                'name' => $name,
                'description'=>$description,
                'address'=>$address,
            ]);

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
            $email = $request->input('email');
            $employer = Employer::findOrFail($email);
            $employer->delete();
        }catch(ModelNotFoundException){
            return redirect()->route('profile')->with(['message'=> 'Error']);
        }
        return redirect()->route('home')->with(['message'=> 'Eliminated Account']);
    }


}
