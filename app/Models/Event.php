<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Traits\IsActive;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	use IsActive;
	
	protected $fillable = [
		'name'
	];
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
