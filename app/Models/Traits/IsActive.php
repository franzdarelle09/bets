<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait IsActive
{
	public function scopeActive(Builder $builder)
	{
		$builder->whereStatus('1');
	}
}