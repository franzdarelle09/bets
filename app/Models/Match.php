<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Category;
use App\Models\Event;
use App\Models\Traits\HasChildren;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	use HasChildren;

	protected $fillable = [
		'name',
		'slug',
		'number_of_matches',
		'stream',
		'match_status',
		'scheduled_date'
	];

    public function teama()
    {
    	return $this->hasOne(Team::class,'id','team_a');
    }
    public function teamb()
    {
    	return $this->hasOne(Team::class,'id','team_b');	
    }
    public function children()
    {
    	return $this->hasMany(Match::class,'parent_id','id');
    }
    public function category()
    {
    	return $this->hasOne(Category::class,'id','category_id');
    }

    public function event()
    {
    	return $this->hasOne(Event::class,'id','event_id');
    }

}
