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
use Carbon\Carbon;
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
        try{
            $requestes = DB::table('request')
                ->join('placement', 'placement.id', '=', 'request.idPlacement')
                ->join('employer', 'employer.email', '=', 'placement.employer_email')
                ->join('users', 'users.email', '=', 'employer.email')
                ->where('request.student_email', $student->email)
                ->select('users.name', 'employer.email')
                ->get();
        }catch(QueryException){
            return response(0);
        }
        return response($requestes);
    }

    public function indexByPlacement(Placement $placement)
    {

        $requestes = DB::table('request')
            ->join('student', 'student.email', '=', 'request.student_email')
            ->join('users', 'users.email', '=', 'student.email')
            ->where('idPlacement', $placement->id)
            ->select('request.presentation_letter', 'request.path_curriculum', 'users.name', 'student.email')
            ->get();
        return response($requestes);
    }

    public function requestActive(Student $student){
        try{
            $today = Carbon::today();

            $requestes = DB::table('request')
                ->join('placement', 'placement.id', '=', 'request.idPlacement')
                ->join('employer', 'employer.email', '=','placement.employer_email')
                ->join('users', 'users.email', '=', 'employer.email')
                ->where('request.student_email', $student->email)
                ->where('placement.start_date', '<=', $today->format('Y-m-d'))
                ->where('placement.expiration_date', '>=', $today->format('Y-m-d'))
                ->select('users.email', 'placement.title')
                ->get();
        }catch(QueryException){
            return response(0);
        }
        return response($requestes);
    }

    public function requestClosed(Student $student){
        try{
            $today = Carbon::today();

            $requestes = DB::table('request')
                ->join('placement', 'placement.id', '=', 'request.idPlacement')
                ->join('employer', 'employer.email', '=','placement.employer_email')
                ->join('users', 'users.email', '=', 'employer.email')
                ->where('request.student_email', $student->email)
                ->where('placement.start_date', '>', $today->format('Y-m-d'))
                ->orWhere('placement.expiration_date', '<', $today->format('Y-m-d'))
                ->select('users.email', 'placement.title')
                ->get();
        }catch(QueryException){
            return response(0);
        }
        return response($requestes);
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
            $file = $request->file('curriculum');
            $extention = $request->file('curriculum')->getClientOriginalExtension();
            $path = str_replace('.','', $request->input('idPlacement').$student->email);

            $file->move('local/curriculum',$path.'.'.$extention);

            DB::table('request')
                ->insert([
                    'idPlacement'=>$request->input('idPlacement'),
                    'presentation_letter'=>$request->input('presentation_letter'),
                    'path_curriculum'=>'local/curriculum'.'/'.$path.'.'.$extention,
                    'student_email'=>$student->email,
                ]);
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
        return response($requestes);
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
            return response(0);
        }
        return response(1);
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
