<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Student;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Hash;

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
                        'password' => Hash::make($request->input('password')),
                        'name' => $request->input('name'),
                    ]);

                 DB::table('student')
                    ->insert([
                        'email' => $request->input('email'),
                        'surname' => $request->input('surname'),
                        'birth_date' => $request->input('birth_date')
                    ]); 
                     
                $categories = $request->input('category');
                foreach($categories as $item){
                    DB::table('student_has_category')
                        ->insert([
                            'category_name' => $item,
                            'student_email' => $request->input('email'),
                        ]);
                }    
                       
            }else{
                    return response(0);
               }
               return response(1); 
        } catch (QueryException) {
            return response(0);
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
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'password' => Hash::make($request->input('password')),
                    ]);

                 DB::table('employer')
                    ->insert([
                        'email' => $request->input('email'),
                        'description' => $request->input('description'),
                        'address' => $request->input('address'),
                    ]); 
            }
            else{
                return response(0);
            }
            return response(1); 
        } catch (QueryException) {
            return response(0);
        } 
    }

    public function getCategory(){
        $cat = Category::all();
        return response($cat->jsonSerialize(), 200);
    }
}