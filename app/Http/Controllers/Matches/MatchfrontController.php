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
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MatchfrontController extends Controller
{
	
	private $helper;

    public function __construct()
    {
        $this->helper = new HelperController;
    }


    public function match($slug)
    {	
    	$match = Match::where('slug',$slug)->first();
    	if (is_null($match->parent_id)){
    		$parent_id = $match->id;
    	}else{
    		$m = Match::where([
    			['id','=',$match->parent_id]
    		])->first();

    		$parent_id = $match->parent_id;
    	}

    	


    	$user_id = Auth::user()->id ?? 0;
    	$bet = Bet::where([
    		['user_id', '=',$user_id],
    		['match_id','=',$match->id]
    	])->first();
    	$helper = new HelperController;
        $odds = $this->helper->getOdds($match->id);
        

    	$odds_a = $odds['team_a']['odds'];
    	$odds_b = $odds['team_b']['odds'];
        if (!is_null($bet)){
        	if ($odds['team_a']['team_id'] == $bet->team_id){
        		$myodds = $odds_a;
        	}else{
        		$myodds = $odds_b;
        	}
            $rewards = round($bet->points * $myodds,2);
        }else{
            $myodds = null;
            $rewards = null;
        }

    	
    	return view('front.match',compact('match','odds_a','odds_b','bet','rewards'));
    }

    public function predict(Request $request)
    {
    	if (!Auth::check()){
			return 'please login before predicting';
		}else{
			$user = User::find(Auth::user()->id);    			
		}
    	$match = Match::where('slug',$request->input('slug'))->first();
    	if (!($match->teama->id == $request->input('current_team') || $match->teamb->id == $request->input('current_team'))){
    		return 'cheecky bastard';
    	}
    	if ($match->match_status == 'upcoming'){
    				
    		if ($request->input('prediction_amount') > $user->points){
    			return 'Not enough balance, Please reload.';
    		}else{
    			$mybet = Bet::where([
					['user_id','=',Auth::user()->id],
					['match_id','=',$match->id]
				])->first();
    			if ($mybet == null){
    				$bet = new Bet;
    				$bet->user_id = $user->id;
    				$bet->match_id = $match->id;
    				$bet->team_id = $request->input('current_team');
    				$bet->points = $request->input('prediction_amount');
    				$bet->status = 'pending';
    				$bet->save();

    				$points = $user->points - $request->input('prediction_amount');
    				$user->points = $points;
    				$user->save();
    				return 'success';
	    		}else{
	    			if($mybet->team_id == $request->input('current_team')){
		    			$current_bet_points = $mybet->points;
		    			$new_bet_points = $current_bet_points + $request->input('prediction_amount');
		    			$mybet->points = $new_bet_points;
		    			$mybet->save();

		    			$points = $user->points - $request->input('prediction_amount');
	    				$user->points = $points;
	    				$user->save();
	    				return 'success';
    				}else{
    					return 'You cant bet on opposing team';
    				}
	    		}	
    		}
    		
    	}else{
    		return 'You cant bet on live matches';
    	}
    }
}
 