<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ApiController extends Controller
{
    public function auth(Request $request){
    	$user = new User();
    	$user->email = $request->input('email');
    	$user->password = $request->input('password');
    	Auth::login($user);
    	if(Auth::user()){
    		$user = User::where('email','=',$request->input('email'))->get();
    		return $user;
    	}else{
    		return "You were not logged in";
    	}
    }

    public function testApi(Request $request){
    	$user = User::where('apikey', '=', $request->get('apikey'))->first();

    	return $user;
    }
}
