<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
    	return CategoryResource::collection(
    		Category::ordered()->get(['id','name','order'])
    	);
    }
}
