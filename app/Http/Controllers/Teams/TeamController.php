<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
    	$teams = Team::whereStatus('1')->get();
    	return view('admin.teams',compact('teams'));
    }



    public function indexapi()
    {
        return TeamResource::collection(
            Team::whereStatus(1)->get()
        );
    }



    public function create()
    {
    	return view('admin.create_team');
    }



    public function store(Request $request)
    {
        if ($request->hasFile('image')){
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension = $request->file('image')->guessClientExtension();
            $filaNameToStore = time().'_'.$filename.'.'.$extension;
            $path = $request->file('image')->storeAs('public/images/teams',$filaNameToStore);
        }else{
            $filaNameToStore = 'noimage.jpg';
        }

        $team = $request->isMethod('put')  ? Team::findOrFail($request->team_id) : new Team;
        $team->id = $request->input('team_id');
        $team->name = $request->input('name');
        $team->descriptive_name = $request->input('descriptive_name');
        $team->photo = $filaNameToStore;
        $team->status = 1;
        
        if($team->save()){
            return redirect('teams');
        }
    }
}
