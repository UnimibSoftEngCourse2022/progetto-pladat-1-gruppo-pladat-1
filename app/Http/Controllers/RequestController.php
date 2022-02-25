<?php

namespace App\Http\Controllers;

use App\Models\Placement;
use App\Models\Req;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Exception;
use Illuminate\Support\Facades\Storage;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource for Student
     * @param Student $student
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student)
    {
        $requestes = Request::all()
            ->where('student_email', $student->email);
        return response($requestes->jsonSerialize(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response("create Success", 200)->view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Student $student
     * @param Placement $placement
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student)
    {
        try {
            $name = $request->file('curriculum')->getClientOriginalName();
            Storage::disk('public')->put('ciao', $name);
            
            dd(Storage::disk('public')->get($name));
            
            if($request->hasfile('curriculum')){
                //prende il nome del file
                $name = "banana";
                //salva
                $path = $request->file('curriculum')->store('app/public/'.$name);
                Photo::create(['path'=>$path]);
                DB::table('request')
                    ->insert([
                        'idPlacement'=>$request->input('idPlacement'),
                        'presentation_letter'=>$request->input('presentation_letter'),
                        'path_curriculum'=>$path,
                        'student_email'=>$student->email,
                    ]);
                }
        }catch(QueryException) {
            return response(0);
        }
        return response(1);
    }

    /**
     * Display the specified resource.
     *
     * @param  Req $request
     * @param Placement $placement
     * @param Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student, Req $request)
    {
        try {
            $requestes = Request::all()
                ->where('student_email', $student->email)
                ->where('idPlacement', $request->idPlacement);
        }catch(QueryException){
            return response("show Error", 500);
        }
        return response($requestes->jsonSerialize(), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Req $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student, Req $request)
    {
        try{
            $requestes = DB::table('request')
                ->join('curriculum', 'request_student_email', '=', 'student_email')
                ->where('student_email', $student->email)
                ->where('idPlacement', $request->idPlacement)
                ->get();
        }catch(QueryException){
            return response("edit Error", 500);
        }
        return response($requestes->jsonSerialize(), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Req $request
     * @param Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Req $request, Student $student)
    {
        try{
            DB::table('request')
                ->where('student_email', $student->email)
                ->where('idPlacement', $request->idPlacement)
                ->update([
                    'presentation_letter'=>$req->input('presentation_letter'),
                ]);
        }catch(QueryException){
            return response("error Success", 500);
        }
        return response("update Success", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Req $request
     * @param Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Req $request, Student $student)
    {
        try{
            DB::table('request')
                ->where('student_email', $student->email)
                ->where('idPlacement', $request->idPlacement)
                ->delete();
        }catch(QueryException){
            return response("destroy Error", 500);
        }
        return response("destroy Success", 200);

    }
}
