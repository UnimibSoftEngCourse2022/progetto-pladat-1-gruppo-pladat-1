<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Student;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'name' => ['required'],
            'surname' => ['required'],
            'birth_date' => ['required'],
        ]);
        
        try {
            if(User::all()->where('email', $request->input('email'))->count()==0){
                DB::table('users')
                    ->insert([
                        'email' => $request->input('email'),
                        'password' => $request->input('password'),
                    ]);

                 DB::table('student')
                    ->insert([
                        'email' => $request->input('email'),
                        'name' => $request->input('name'),
                        'surname' => $request->input('surname'),
                        'birth_date' => $request->input('birth_date')
                    ]); 
                
                    
                $categories = $request->input('category');
                if($categories->isEmpty()){
                    return response("Nessuna categorie selezionata");
                }
                else{
                    $categories->toArray();
                    foreach( $categories as $item){
                        DB::table('student_has_category')
                            ->insert([
                                'category_name' => $item->name,
                                'student_email' => $request->input('email'),
                            ]);
                    }
                }

                
            }else{
                    return response("Email già esistente");
                }
            return response('Registrato con successo')->view('login'); 
        } catch (QueryException) {
            return response('Registrazione fallita')->view('registrazione');
        } 
    }

    /*
     * Questo metodo si occupa dell'inserimento dei dati per la
     * registrazione di un employer
     */
    public function EmployerRegistration(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'name' => ['required'],
            'description' => [],
            'address' => ['required'],
        ]);
        
        try {
            if(User::all()->where('email', $request->input('email'))->count()==0){
                DB::table('users')
                    ->insert([
                        'email' => $request->input('email'),
                        'password' => $request->input('password'),
                    ]);

                 DB::table('employer')
                    ->insert([
                        'email' => $request->input('email'),
                        'name' => $request->input('name'),
                        'description' => $request->input('description'),
                        'address' => $request->input('address'),
                    ]); 
            }
            else{
                return response("Email già esistente");
            }
                return response()->view('login'); 
        } catch (QueryException) {
            return response()->view('registrazione');
        } 
    }

    public function getCategory(){
        $cat = Category::all();
        return response($cat->jsonSerialize(), 200);
    }

}
