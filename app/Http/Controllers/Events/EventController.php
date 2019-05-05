<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
    	$event = Event::active()->get();
    	$title = 'Events';
    	return view('admin.event',compact('event','title'));
    }

    public function create()
    {
        $categories = Category::all();
    	return view('admin.create_event',compact('categories'));
    }

    public function store(Request $request)
    {
        $event = $request->isMethod('put') ? Article::findOrFail($request->event_id) : new Event;
        $event->id = $request->input('event_id');
        $event->name = $request->input('name');
        $event->category_id = $request->input('category_id');
        $event->status = 1;
        if($event->save()){
            return redirect('events');
        }else{
            return 'error';
        }
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->status = 0;
        if($event->save()){
            return $event;
        }
        
    }
}
