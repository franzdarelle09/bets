<?php

namespace App\Http\Controllers\Matches;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Http\Resources\MatchResource;
use App\Models\Bet;
use App\Models\Category;
use App\Models\Event;
use App\Models\Match;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MatchController extends Controller
{
    public function test()
    {
      $today = Carbon::today();
      dd($today);
    }

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

    public function store(Request $request){
        $scheduled_date = $request->input('date').' '.$request->input('time');
        $options = json_decode($request->input('options'));
        $parent_id = $this->addMatch($request,'Match Winner','',$scheduled_date);
        $options = json_decode($request->input('options'));
        if($options->f10k){
            for($i = 1; $i <= $request->number_of_matches; $i++){
                $sd = date("Y-m-d H:i:s", strtotime("+$i hours",strtotime($scheduled_date)));
                $this->addMatch($request,'Game '.$i.' First 10 kills',$parent_id,$sd);
            }
        }
        //$this->addMatch($request,'Match Winner',$parent_id);
        // if ($request->input('number_of_matches') > 1){
            
        // }else{
            
        //     $options = json_decode($request->input('options'));
        //     $parent_id = '';
        //     $match = $this->addMatch($request,'Game 1 Winner',$parent_id);
        //     print_r($match);
            
        // }
    }

    public function addMatch($request,$name,$parent_id,$scheduled_date){
        $team_a = Team::findOrFail($request->input('team_a'));
        $team_b = Team::findOrFail($request->input('team_b'));
        $event = Event::findOrFail($request->input('event_id'));
        $slug = Str::slug($team_a->name.'-'.$team_b->name.'-'.$event->name.'-'.date('Y').uniqid(),'-');
        $match = $request->isMethod('put')  ? Match::findOrFail($request->match_id) : new Match;
        $match->id = $request->input('match_id');
        $match->name = $name;
        $match->slug = $slug;
        $match->event_id = $request->input('event_id');
        $match->category_id = $request->input('category_id');
        $match->team_a = $request->input('team_a');
        $match->team_b = $request->input('team_b');
        $match->match_status = 'upcoming';
        $match->status = 1;
        $match->number_of_matches = $request->input('number_of_matches');
        $match->scheduled_date = $scheduled_date;
        if ($parent_id != ''){
            $match->parent_id = $parent_id;    
        }
        
        if($result = $match->save()){
            return $match->id;
        }else{
            return 'error';
        }

    }

    public function indexapi()
    {
    	return MatchResource::collection(
    		Match::with('children')->parents()->get()
    	);
    }

    public function matchDetails($slug)
    {
        $match = Match::whereSlug($slug)->first();
        return view('admin.match',compact('match'));
    }

    public function delete()
    {
        Match::truncate();
        Bet::truncate();
    }

    public function addTime(Request $request)
    {
        $data = $request->all();
        print_r($data);
    }
}
