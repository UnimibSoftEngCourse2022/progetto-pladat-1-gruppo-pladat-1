<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchCategory(Request $request, Category $category){
        
        $today = Carbon::today();

        $placements = DB::table('placement_has_category')
            ->join('placement', 'placement.id', '=', 'placement_has_category.idPlacement')
            ->where('idCategory', $category->name)
            ->whereDate('start_date', '<', $today->format('Y-m-d'))
            ->whereDate('expiration_date', '>', $today->format('Y-m-d'))
            ->get();

        return response($placements->jsonSerialize());
    }

}
