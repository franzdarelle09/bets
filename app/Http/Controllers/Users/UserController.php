<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function save(Request $request)
    {	
    	$user = User::where('email',$request->input('email'))->first();
    	if($user === null){
    		if (strlen($request->input('password')) < 7){
    			return 'Password is too short';
    		}
    		else{
    			$user = new User;
    			$user->email = $request->input('email');
    			$user->name = $request->input('name');
    			$user->password = Hash::make($request->input('password'));
    			$user->points = $request->input('points');
    			$user->role = 'member';
    			$user->points = 0;
    			$user->save();

    			if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
				    return 'success';
				}else{
					return 'cant login';
				}
    		}
    	}
    	else{
    		return 'Whoops duplicate email';
    	}
    }

    public function signin(Request $request)
    {
    	$remember = (isset($remember)) ? true:false;
    	if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')],true)) {
		    return 'success';
		}else{
			return 'whoops email or password is incorrect';
		}
    }

    public function signout()
    {
    	Auth::logout();
    	return redirect('/');
    }
}
