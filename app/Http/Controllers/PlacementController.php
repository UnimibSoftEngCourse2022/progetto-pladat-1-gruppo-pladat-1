<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Placement;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use League\CommonMark\Extension\CommonMark\Parser\Inline\OpenBracketParser;

class PlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function index(Employer $employer)
    {
        $placements = Placement::all()
            ->where('employer_email', $employer->email);
        return response($placements->jsonSerialize(), 200);
    }

    /**
     * Show the form for creating a new resource.
     * @param Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function create(Employer $employer)
    {
        return response($employer->jsonSerialize(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employer $employer)
    {
        /*
         * Aggiungo alla tabella placement tutti i valori presenti nel form.
         */
        try{
            DB::table('placement')
                ->insert([
                    'title'=>$request->input('title'),
                    'description'=>$request->input('description'),
                    'duration'=>$request->input('duration'),
                    'start_date'=>$request->input('start_date'),
                    'expiration_date'=>$request->input('expiration_date'),
                    'start_placement'=>$request->input('start_placement'),
                    'salary'=>$request->input('salary'),
                    'employer_email'=>$employer->email,
                ]);
        }catch(QueryException){
            return response("Error", 500);
        }
        return response("Success", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  Placement $placement
     * @return \Illuminate\Http\Response
     */
    public function show(Placement $placement)
    {
        try {
            $placements = Placement::all()
                ->where('id', $placement->id);
        }catch(QueryException){
            return response("error", 500);
        }
        return response($placements->jsonSerialize(), 200)->view('');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Placement  $placement
     * @return \Illuminate\Http\Response
     */
    public function edit(Placement $placement)
    {
        try {
            $placements = Placement::all()
                ->where('id', $placement->id);
        }catch(QueryException){
            return response("error", 500);
        }
        return response($placements->jsonSerialize(), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Placement  $placement
     * @param Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Placement $placement)
    {
        try{
            Placement::all()
                ->where('id', $placement->id)
                ->update([
                    'title'=>$request->get('title'),
                    'description'=>$request->get('description'),
                    'duration'=>$request->get('duration'),
                    'start_date'=>$request->get('start_date'),
                    'expiration_date'=>$request->get('expiration_date'),
                    'start_placement'=>$request->get('start_placement'),
                    'salary'=>$request->get('salary'),
                ]);
        }catch(QueryException){
            return response("update Error", 500);
        }
        return response("update Success", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Placement $placement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Placement $placement)
    {
       try{
           Placement::all()
               ->where('id', $placement)
               ->delete();
       }catch(QueryException){
           return response("update Error", 500);
       }
        return response("update Success", 200);
    }

}
