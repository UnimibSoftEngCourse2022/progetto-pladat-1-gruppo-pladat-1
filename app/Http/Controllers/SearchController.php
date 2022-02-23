<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchCategory(Request $request){
        
        $category = $request->input('category');

        $placements = DB::table('placement_has_category')
            ->where('idCategory', $category)
            ->get();

        return response($placements->jsonSerialize());
    }
}
