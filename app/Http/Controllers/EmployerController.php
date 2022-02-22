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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        /*
        * Possibile che sia all'interno della registrazione
         * La sessione non c'è al momento della registrazione.
        */
        try{
            DB::table('employer')
                ->insert([
                    'email'=>$request->input('email'),
                    'name'=>$request->input('name'),
                    'description'=>$request->input('description'),
                    'address'=>$request->input('address'),
                    'password'=>$request->input('password'),
                    'path_photo'=>$request->input('path_photo'),
                ]);
        }catch(QueryException){
            return response("Error", 500);
        }
        return response("Success", 200);


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
                $placements = DB::table('employer')
                    ->where('email', $employer->email)
                    ->get();
            }
        }catch(ModelNotFoundException){
            return response("show Error", 500);
        }
        return response($placements->jsonSerialize(), 200)->view();
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
        return response($placements->jsonSerialize(), 200);


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
            return response("Update Error", 500);
        }
        return response("update Success", 200);
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
            return response("update Error", 500);
        }
        return response("destroy Success", 200);
    }

}

