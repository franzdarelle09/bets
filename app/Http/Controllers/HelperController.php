<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bet;
use App\Models\Category;
use App\Models\Event;
use App\Models\Match;
use App\Models\Team;
use App\Models\User;

class HelperController extends Controller
{
    public $commission_percentage = 0.05;
    //only returns real value if both sides have bet already
    
    public function getOdds($match_id)
	{
        $match = Match::findOrFail($match_id);
        $teama_id = $match->team_a;
        $teamb_id = $match->team_b;

		$a = Bet::where([
			['match_id','=',$match_id],
			['team_id','=',$teama_id]
		])->sum('points');
		
		$b = Bet::where([
			['match_id','=',$match_id],
			['team_id','=',$teamb_id]
		])->sum('points');
		if($a == 0 || $b == 0){
			$data = array();
			$data['team_a']['odds'] = 0.95;
			$data['team_a']['team_id'] = $teama_id;
			$data['team_b']['odds'] = 0.95;
			$data['team_b']['team_id'] = $teamb_id;
			return $data; 
		}else{
			$base_a = $a + ($b - ($b*$this->commission_percentage));
			$odds_a = ($base_a / $a) - 1;

			$base_b = $b + ($a - ($a*$this->commission_percentage));
			$odds_b = ($base_b / $b) - 1;

			$data = array();
			$odds_a = ((floor($odds_a * 100)) / 100);
			$odds_b = ((floor($odds_b * 100)) / 100);
			$data['team_a']['odds'] = $odds_a;
			$data['team_a']['team_id'] = $teama_id;
			$data['team_b']['odds'] = $odds_b;
			$data['team_b']['team_id'] = $teamb_id;
			return $data;
		}
	}
}
