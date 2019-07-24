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
use DateTime;

class MatchController extends Controller
{

    public function __construct()
    {
        $this->helper = new HelperController;
    }

    public function test()
    {
        $sched = "2019-07-04 07:00:00";        
        $data = $this->getDiff($sched);
        return $data;
        
    }

    private function getDiff($sched)
    {

        //Convert it into a timestamp.
        $sched = strtotime($sched);
         
        //Get the current timestamp.
        $now = time();
         
        //Calculate the difference.
        $seconds = $sched - $now;

        $days = floor($seconds / (60*60*24) );
        $hours = floor($seconds / (60*60) );
        $minutes = floor($seconds / 60 );
        if ($days != 0){
            if (abs($days) == 1){
                $data['label'] = 'day';    
            }else{
                $data['label'] = 'days';
            }
            
            $data['value'] = $days;
        }
        elseif($hours != 0){
            if (abs($hours) == 1){
                $data['label'] = 'hour';
            }else{
                $data['label'] = 'hours';
            }
            $data['value'] = $hours;
        }
        elseif($minutes != 0){
            if (abs($minutes) == 1){
                $data['label'] = 'minute';
            }else{
                $data['label'] = 'minutes';
            }
            $data['value'] = $minutes;
        }else{
            if (abs($seconds) == 1){
                $data['label'] = 'second';    
            }else{
                $data['label'] = 'seconds';
            }
            
            $data['value'] = $seconds;
        }
        return $data;
    }

    public function home(){
        $m = array();
        $matches = Match::whereNull('parent_id')->get();

        
        foreach($matches as $match){
            $children = Match::whereParentId($match->id)->get();
            $match->children = $children;
            $data = $this->getDiff($match->scheduled_date);
            $match->time = $data['value'].' '.$data['label'];
            $odds = $this->helper->getOdds($match->id);
            $match->odds_a = $odds['team_a']['odds'];
            $match->odds_b = $odds['team_b']['odds'];
            $m[] = $match;
            // dd($match->time);
        }
        
        return view('front.home',['matches' => $m]);
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
        $date = date('Y-m-d',strtotime($match->scheduled_date));
        $time = date('H:i',strtotime($match->scheduled_date));
        $match_list = array();
        if (is_null($match->parent_id)){
            $related_matches = Match::whereParentId($match->id)->get();
            foreach($related_matches as $rm){
                $match_list[] = $rm;
            }
            array_unshift($match_list, $match);
            
        }else{
            $head_match = Match::find($match->parent_id);
            $match_list[] = $head_match; 
            $related_matches = Match::whereParentId($head_match->id)->get();
            foreach($related_matches as $rm){
                $match_list[] = $rm;
            }
        }

        return view('admin.match',compact('match','date','time','match_list'));
    }

    public function delete()
    {
        Match::truncate();
        Bet::truncate();
    }

    public function addTime(Request $request)
    {
        $match_id = $request->input('match_id');
        $match = Match::find($match_id);
        $new_date = date('Y-m-d H:i:s',strtotime("+5 minute",strtotime(date('Y-m-d H:i:s'))));
        $match->scheduled_date = $new_date;
        $match->save();
        return $new_date;
    }

    public function manualTime(Request $request)
    {
        $input = $request->all();
        $new_date =  $input['date'].' '.$input['time'];
        $scheduled_date = date('Y-m-d H:i:s',strtotime($new_date));
        $match = Match::find($input['match_id']);
        $match->scheduled_date = $scheduled_date;
        if($match->save()){
            echo 'schedule updated to '.$match->scheduled_date;
        }else{
            echo 'error';
        }
    }

}
