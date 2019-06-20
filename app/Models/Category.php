<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Traits\IsOrderable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use IsOrderable;
    public $timestamps = false;
    protected $fillable = [
    	'name',
    	'order'
    ];

    public function events()
    {
    	return $this->hasMany(Event::class);
    }
}
