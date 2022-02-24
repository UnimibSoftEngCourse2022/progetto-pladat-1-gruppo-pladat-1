<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         * Se non c'è nessun elemento nella tabella student non è un errore
         */
        $student = Student::all();
        return response($student->jsonSerialize(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        /*
         * Questo metodo sarebbe la registrazione
         */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::table('student')
                ->insert([
                    'email'=>$request->input('email'),
                    'name'=>$request->input('name'),
                    'surname'=>$request->input('surname'),
                    'password'=>$request->input('password'),
                    'birth_date'=>$request->input('birth_date'),
                    'presentation'=>$request->input('presentation'),
                ]);

            /*
             * Inserisco nella tabella student_has_category la categoria associata
             * all'utente.
             */
            DB::table('student_has_category')
                ->insert([
                    'student_email'=>$request->input('email'),
                    'category_name'=>$request->input('category'),
                ]);
            return response("failed", 500);
        }catch(\Exception){
            return response("success", 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Student $student)
    {
        try{
            if(Student::findOrFail($student->email)) {
                $stud = DB::table('student')
                    ->join('users', 'student.email', '=', 'users.email')
                    ->where('student.email', $student->email)
                    ->get();
            }        
        }catch(QueryException){
            return response("Error", 500);
        }
        return response($stud);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $element = DB::table('student')
            ->where('email', $student->email);

        return response("edit Success", 200, $element->jsonSerialize())->view('profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        try{
            DB::table('student')    
            ->join('users', 'users.email', '=', 'student.email')
            ->where('student.email', $student->email)
            ->update([
                'name' => $request->input('name'),
                'surname'=>$request->input('surname'),
                'birth_date'=>$request->input('birth_date'),
            ]);
        
            $categories = $request->input('category');

            DB::table('student_has_category')
                ->where('student_email', $student->email)
                ->delete();

            foreach($categories as $item){
                DB::table('student_has_category')
                    ->insert([
                        'student_email'=>$student->email,
                        'category_name'=>$item,
                    ]);
            }
        }catch(QueryException){
            return response(0);
        }
        return response(1);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Student $student)
    {
        try {
            Auth::logout();
    
            $request->session()->invalidate();
    
            $request->session()->regenerateToken();
    
            DB::table('users')
                ->where('email', $student->email)
                ->delete();

        }catch(QueryException){
            return response(0);
        }
        return response(1);
    }

    public function getCategory(Request $request, Student $student){
        try{
            $category = DB::table('student_has_category')
                ->where('student_email', $student->email)
                ->get();
            return response($category);
        }catch(QueryException){
            return response("Error");
        }
    }
}
