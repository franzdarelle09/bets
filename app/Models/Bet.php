<?php

namespace App\Models;

use App\Models\Match;
use App\Models\Team;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    public function match()
    {
    	return $this->belongsTo(Match::class);
    }

    public function team()
    {
    	return $this->belongsTo(Team::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
