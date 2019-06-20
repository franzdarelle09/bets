<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	private $categories = ['DOTA 2','CSGO','LOL','SPORTS','OVERWATCH'];
    public function index(){
    	return CategoryResource::collection(
    		Category::ordered()->get(['id','name','order'])
    	);
    }

    public function populateCategory()
    {
    	$order = 1;
    	foreach ($this->categories as $category) {
    		Category::firstOrCreate([
    			'name' => $category,
    			'order' => $order
    		]);
    		$order++;
    	}
    }
}
