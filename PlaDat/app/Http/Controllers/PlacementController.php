<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = Session::get('email');

        $placements = DB::table('placement')
            ->where('employer_email', $email)
            ->get();

        return response("index Success", 200, $placements->jsonSerialize());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response("success Create")->view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->session()->get('email');

        DB::table('placement')->where('email', $email)->insert([
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'duration'=>$request->get('duration'),
            'start_date'=>$request->get('start_date'),
            'expiration_date'=>$request->get('expiration_date'),
            'start_placement'=>$request->get('start_placement'),
            'salary'=>$request->get('salary'),
            'employer_email'=>$email,
        ]);

        return response("Success", 200)->view('profile');
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

        $placements = DB::table('placement')
            ->where('employer_email', $email)
            ->where('id', $id)
            ->get();

        return response("show Success", 200, $placements->jsonSerialize())->view('');

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

        $placement = DB::table('placement')
            ->where('employer_email', $email)
            ->where('id', $id)
            ->get();

        return  response("Success", 200, $placement->jsonSerialize())->view('');

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
        $email = $request->session()->get('email');

        DB::table('placement')
            ->where('employer_email', $email)
            ->where('id', $id)
            ->update([
                'title'=>$request->get('title'),
                'description'=>$request->get('description'),
                'duration'=>$request->get('duration'),
                'start_date'=>$request->get('start_date'),
                'expiration_date'=>$request->get('expiration_date'),
                'start_placement'=>$request->get('start_placement'),
                'salary'=>$request->get('salary'),
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

        DB::table('placement')
            ->where('employer_email', $email)
            ->where('id', $id)
            ->delete();

        return response("update Success", 200);
    }
}
