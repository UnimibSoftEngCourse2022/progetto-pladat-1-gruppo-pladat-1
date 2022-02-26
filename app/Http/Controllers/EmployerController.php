<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Exception;
use Illuminate\Support\Facades\Auth;
use File;


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
        }catch(QueryException){
            return response("show Error", 500);
        }
        return response($plac);
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
        }catch(QueryException){
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
                    ->join('users', 'users.email', '=', 'employer.email')
                    ->where('employer.email', $employer->email)
                    ->update([
                        'name' => $request->input('name'),
                        'description' => $request->input('description'),
                        'address' => $request->input('address'),
                        'idPhoto'=>$request->input('path_photo'),
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
     * @param  Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Employer $employer)
    {
        try {
            Auth::logout();
    
            $request->session()->invalidate();
    
            $request->session()->regenerateToken();
    
            DB::table('users')
                ->where('email', $employer->email)
                ->delete();

        }catch(QueryException){
            return response(0);
        }
        return response(1);
    }

    public function addImage(Request $request, Employer $employer){
        try{
            $file = $request->file('image');
            $extention = $request->file('image')->getClientOriginalExtension();
            $path = str_replace('.','', $employer->email);
            $file->move('local/images',$path.'.'.$extention);

            if($employer->idPhoto != null){
                $oldPath = DB::table('photo')
                    ->where('id', $employer->idPhoto)
                    ->get();
                File::delete($oldPath);
            }

            DB::table('photo')
                ->insert([
                    'path' => $path.'.'.$extention,
                ]);
                
            $id = DB::table('photo')
                ->latest('id')
                ->first()
                ->id;
            
            DB::table('employer')
            ->where('email', $employer->email)
            ->update([
                'idPhoto'=>$id,
            ]);

            DB::table('photo')
                ->where('id', $employer->idPhoto)
                ->update([
                    'path'=>$path.'.'.$extention,
                ]);

        }catch(QueryException){
            return response(0);
        }
        return response(1);
    }

    public function getImage(Request $request, Employer $employer){
        try{
            if($employer->idPhoto == null){
                return responce(1);
            }
            else{
                $path = DB::table('employer')
                    ->join('photo', 'photo.id', '=', 'employer.idPhoto')
                    ->where('employer.email', $employer->email)
                    ->select('photo.path')
                    ->get();
            }
            
        }catch(QueryException){
            return response(0);
        }
        return response($path);
    }

}

