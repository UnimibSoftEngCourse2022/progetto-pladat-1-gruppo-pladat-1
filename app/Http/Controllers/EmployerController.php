<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Exception;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employers = Employer::all();
        return response($employers->jsonSerialize(), 200);
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
     * Display the specified resource.
     *
     * @param  Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $employer)
    {
        try{
            if(Employer::findOrFail($employer->email)) {
                $plac = DB::table('employer')
                    ->join('users', 'employer.email', '=', 'users.email')
                    ->where('employer.email', $employer->email)
                    ->get();
            }
        }catch(ModelNotFoundException){
            return response("show Error", 500);
        }
        return response($placements);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit(Employer $employer)
    {
        try{
            if(Employer::findOrFail($employer->email)) {
                $placements = DB::table('employer')
                    ->where('email', $employer->email)
                    ->get();
            }
        }catch(ModelNotFoundException){
            return response("show Error", 500);
        }
        return response($placements->jsonSerialize());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employer $employer)
    {
        try{
            if(Employer::findOrFail($employer->email)) {
                DB::table('employer')
                    ->where('email', $employer->email)
                    ->update([
                        'name' => $request->input('name'),
                        'description' => $request->input('description'),
                        'address' => $request->input('address'),
                        'path_photo'=>$request->input('path_photo'),
                    ]);
            }
        }catch(ModelNotFoundException){
            return response(0);
        }
        return response(1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employer $employer)
    {

        try{
            if(Employer::findOrFail($employer->email)){
                DB::table('employer')
                    ->where('email', $employer->email)
                    ->delete();
            }
        }catch(ModelNotFoundException){
            return response(0);
        }
        return response(1);
    }

}

