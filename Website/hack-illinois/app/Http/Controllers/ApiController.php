<?php

namespace App\Http\Controllers;

use App\Chore;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function auth(Request $request){
    	if(Auth::once($request->all())){
    		$user = User::where('email','=',$request->input('email'))->get();
    		return $user;
    	}else{
    		$errors = array();
    		$errors['message'] = "Invalid credentials";
    		return $errors;
    	}
    }

    public function testApi(Request $request){
    	$user = User::where('apikey', '=', $request->get('apikey'))->first();

    	return $user;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'apikey' => bcrypt($data['email'] . "" . $data['password']),
            'apartment_id' => 1
        ]);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            /*$this->throwValidationException(
                $request, $validator
            );*/
            return $validator->messages();
        }
        $user = $this->create($request->all());
        $auth = Auth::login($user);
        $user->save();

        return $user;
    }

    public function retreiveEverything(Request $request){
    	$user = User::where('apikey', '=', $request->input('apikey'))->first();
    	$array = array();
    	$array['user'] = $user;
    	$chores = $user->chores()->due()->get();
        $apartment = $user->apartment;
        $listOfChores = array();
        $listOfRoommates = array();
        foreach ($apartment->user as $roommate) {
            if($user->id != $roommate->id){
                $listOfChores[''.$roommate->name] = $roommate->chores()->due()->get();
                $listOfRoommates[''.$roommate->name] = $roommate;
            }
        }
        $array['userChores'] = $chores;
        $array['listOfChores'] = $listOfChores;

        return $array;
    }

    public function completeChore(Request $request){
    	$user = User::where('apikey', '=', $request->input('apikey'))->first();
    	$chore = Chore::findOrFail($request->input('choreId'));
    	$chore->finished_today = "Yes";
    	$chore->save();
    	$user->numberOfCompletedChores++;
    	$user->save();

        return $chore;
    }
}
