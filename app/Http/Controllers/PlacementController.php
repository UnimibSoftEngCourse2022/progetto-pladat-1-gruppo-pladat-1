<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        try{
            $placements = Placement::all()
                ->where('employer_email', $employer->email);
        }catch(QueryException){   
            return response(0);
        }
        return response($placements);
    }

    public function indexActivePlacement(Request $request, Employer $employer){
        try{
        
            $today = Carbon::today();

            $placements = DB::table('placement')
                ->where('employer_email', $employer->email)
                ->having('start_date', '<=', $today->format('Y-m-d'))
                ->having('expiration_date', '>=', $today->format('Y-m-d'))
                ->get();
        }catch(QueryException){
            return response(0);   
        }
        return response($placements);
    }

    public function indexClosedPlacement(Request $request, Employer $employer){
        try{
        
            $today = Carbon::today();

            $placements = DB::table('placement')
                ->where('employer_email', $employer->email)
                ->where('start_date', '>', $today)
                ->orWhere('expiration_date', '<', $today)
                ->get();
        }catch(QueryException){
            return response(0);   
        }
        return response($placements);
    }

    /**
     * Show the form for creating a new resource.
     * @param Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function create(Employer $employer)
    {
        return response($employer);
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
        try{
            DB::table('placement')
                ->insert([
                    'title'=>$request->input('title'),
                    'description'=>$request->input('description'),
                    'duration'=>$request->input('duration'),
                    'start_date'=>$request->input('start_date'),
                    'expiration_date'=>$request->input('expiration_date'),
                    'salary'=>$request->input('salary'),
                    'employer_email'=>$employer->email,
                ]);
            
            $idPlacement = DB::table('placement')
                ->latest('id')
                ->first();
            
            $categories = $request->input('category');
            foreach($categories as $item){
                DB::table('placement_has_category')
                    ->insert([
                        'idCategory' => $item,
                        'idPlacement' => $idPlacement->id,
                    ]);
            }    
        }catch(QueryException){
            return response(0);
        }
        return response(1);
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
                ->where('id', $placement->id)
                ->get();
        }catch(QueryException){
            return response(0);
        }
        return response($placements);
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
            return response(0);
        }
        return response($placements);
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

            DB::table('placement_has_category')
                ->where('idPlacement', $placement->id)
                ->delete();

            $categories = $request->input('category');

            foreach($categories as $item){
                DB::table('placement_has_category')
                    ->insert([
                        'idPlacement'=>$placement->id,
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
