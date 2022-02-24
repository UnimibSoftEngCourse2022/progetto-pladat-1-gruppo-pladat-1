<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Placement;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchCategory(Request $request, Category $category){
        try{
            $today = Carbon::today();

            $cat = str_replace('-',' ', $category->name);

            $placements = DB::table('placement_has_category')
                ->join('placement', 'placement.id', '=', 'placement_has_category.idPlacement')
                ->where('idCategory', $cat)
                ->whereDate('start_date', '<', $today->format('Y-m-d'))
                ->whereDate('expiration_date', '>', $today->format('Y-m-d'))
                ->get();
        }catch(QueryException){
            return response(0);
        }
        return response($placements->jsonSerialize());
    }

    public function searchById(Request $request, Placement $placement){
        try {
            if(Placement::all()->where('id', $placement->id)->count()==0){
                return response(0);
            }
            $plac = DB::table('placement')
                ->join('employer', 'employer.email', '=', 'placement.employer_email')
                ->join('users', 'users.email', '=', 'employer.email')
                ->where('id', $placement->id)
                ->select('users.name', 'users.email', 'placement.title', 'placement.salary', 'placement.duration', 'placement.start_date', 'placement.expiration_date', 'placement.duration')
                ->get();
        }catch(QueryException){
            return response(0);
        }
        return response($plac);
    }

}
