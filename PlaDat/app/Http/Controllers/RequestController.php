<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = Session::get('email');
        $requestes = DB::table('request')
            ->where('student_email', $email)
            ->get();

        return response("index Success", 200, $requestes->jsonSerialize());
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student_email = $request->session()->get('email');
        $idPlacement = $request->input('idPlacement');
        $letter = $request->input('presentation_letter');

        DB::table('request')->insert([
            'idPlacement'=>$idPlacement,
            'presentation_letter'=>$letter,
            'student_email'=>$student_email,
            ]);

        return response("store Success", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email = Session::get('email');
        $requestes = DB::table('request')
            ->where('student_email', $email)
            ->where('id', $id)
            ->get();
        return response("show Success", 200, $requestes->jsonSerialize())->view('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email = Session::get('email');

        $requestes = DB::table('request')
            ->where('student_email', $email)
            ->where('id', $id)
            ->get();

        return response("edit Success", 200, $requestes->jsonSerialize())->view('');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $email = Session::get('email');

        DB::table('request')
            ->where('student_email', $email)
            ->where('id', $id)
            ->update([
                'presentation_letter'=>$request->input('presentation_letter'),
            ]);

        return response("update Success", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email = Session::get('email');

        DB::table('request')
            ->where('student_email', $email)
            ->where('id', $id)
            ->delete();

        return response("destroy Success", 200);
    }
}
