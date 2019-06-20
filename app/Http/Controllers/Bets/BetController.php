<?php

namespace App\Http\Controllers\Bets;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\Bet;
use App\Models\Match;
use App\Models\User;
use Illuminate\Http\Request;

class BetController extends Controller
{
    public function __construct()
    {
        $this->helper = new HelperController;
    }

    public function declareWinner(Request $request)
    {
    	$data = $request->all();
        print_r($data);
    	echo 'Match ID: '.$data['match_id'].' Team ID: '.$data['team_id'];
        echo "<br>";
    	$match = Match::find($data['match_id']);
    	$match->match_status = 'waiting for settlement';
    	$match->winner = $data['team_id'];
    	$match->save();
        
        $odds = $this->helper->getOdds($match->id);
        $odds_a = $odds['team_a']['odds'];
        $odds_b = $odds['team_b']['odds'];

    	$bets = Bet::where('match_id',$data['match_id'])->get();
        // echo $match->winner;

    	foreach($bets as $bet):
            if ($bet->status == 'pending'):
            	if ($bet->team_id === $match->winner){
                    $user = User::find($bet->user->id);
                    if($bet->team_id === $odds['team_a']['team_id']){
                        $reward = $bet->points * $odds_a;
                    }else{
                        $reward = $bet->points * $odds_b;
                    }
                    $reward = (floor($reward * 100)) / 100;
                    $user->points = $user->points + $bet->points + $reward;
                    $user->save();   

                    $bet->status = 'win';
                }else{
                    $bet->status = 'lose';
                }
                $bet->save();
            endif;
    	endforeach;
        $match->match_status = 'Complete';
        $match->save();
    }
}
