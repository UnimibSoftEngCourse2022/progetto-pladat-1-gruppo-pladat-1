<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = DB::table('student')->get();
        if($student == null)
            return response($student->jsonSerialize(), 404);
        return response($student->jsonSerialize(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {

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
            $email = $request->input('email');
            $name = $request->input('name');
            $surname = $request->input('surname');
            $password = $request->input('password');
            $birth_date = $request->input('birth_date');
            $presentation = $request->input('presentation');
            $idPhoto = $request->input('idPhoto');

            DB::table('student')->insert([
                'email'=>$email,
                'name'=>$name,
                'surname'=>$surname,
                'password'=>$password,
                'birth_date'=>$birth_date,
                'presentation'=>$presentation,
                'idPhoto'=>$idPhoto,
            ]);
            return redirect()->route('home');
        }catch(\Exception){
            return redirect()->route('profile');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request, Student $student)
    {
        return view('user.profile', [
            'user' => Student::findOrFail($student->get('email'))
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('user.profile', [
            'user' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {
        /*
         * Appena ho la sessione funzionante la prendo da quella la email da modificare
        */
        $name = $request->input('name');
        $surname = $request->input('surname');
        $presentation = $request->input('presentation');
        $birth_date = $request->input('birth_date');
        $idPhoto = $request->input('idPhoto');

        DB::table('student')->where('email', $email)
            ->update(['name' => $name,
                'surname'=>$surname,
                'presentation'=>$presentation,
                'birth_date'=>$birth_date,
                'idPhoto'=>$idPhoto]);

        return redirect()->route('profile')->with(['message'=> 'Updated Account']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $email)
    {
        try {
            DB::table('curriculum')->where('request_student_email', $email)->delete();
            DB::table('request')->where('student_email', $email)->delete();
            DB::table('student')->where('email', $email)->delete();
        }catch(ModelNotFoundException){
            return redirect()->route('profile')->with(['message'=> 'Error']);
        }
        return redirect()->route('home')->with(['message'=> 'Eliminated Account']);
    }
}
