<?php

namespace App\Http\Controllers\Matches;

use App\Http\Controllers\Controller;
use App\Http\Resources\MatchResource;
use App\Models\Category;
use App\Models\Match;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MatchController extends Controller
{
    public function index()
    {
    	$matches = Match::find(1)->get();
    	// foreach ($matches as $key => $m) {
    	// 	echo $m->name.' - '.$m->teama->name;
    	// 	echo '<br>';
    	// }
    	return view('admin.matches',compact('matches'));
    }

    public function create(){
        $categories = Category::all();
        $matches = Match::all();
        $teams = Team::all();
        return view('admin.create_match',compact('categories','matches','teams'));
    }

    public function indexapi()
    {
    	return MatchResource::collection(
    		Match::with('children')->parents()->get()
    	);
    }
}
